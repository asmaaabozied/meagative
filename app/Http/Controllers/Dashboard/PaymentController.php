<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Payment;
use Carbon\Carbon;
use Facade\FlareClient\View;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PaymentController extends Controller
{

    protected $apiKey = 'OGFjN2E0Y2E3NmUzZGI0NzAxNzZmNTYxYTE3ODE1ODF8bjhkWERnZjYzQg==';

    protected $visaEntityID = '8ac7a4ca76e3db470176f56216a51585';
    protected $madaEntityID = '8ac7a4ca76e3db470176f562bffa158a';

    protected $currencyISO = 'SAR';

    public function verifyPayment()
    {
        $id = \request('id');
        $paymentMethodType = session()->get('paymentMethodType');
        $httpClient = new Client([
            'base_uri' => 'https://test.oppwa.com/'
        ]);
        $respnsoe = $httpClient->request('get', "/v1/checkouts/$id/payment", [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
            ],
            'query' => [
                'entityId' => ($paymentMethodType === 'mada') ? $this->madaEntityID : $this->visaEntityID,
            ]
        ]);

        if ($id) {
            $data = json_decode($respnsoe->getBody(), true);
            if ($data['resultDetails']['response.acquirerMessage'] === 'Approved') {
                Payment::create([
                    'payment_type' => $data['paymentType'],
                    'data_id' => $data['id'],
                    'payment_id' => $data['merchantTransactionId'],
                    'amount'=>$data['amount'],
                    'currency'=>$data['currency'],
                    'payment_brand'=>$data['paymentBrand'],
                    'notes'=>$data['descriptor'],
                    'datetime'=> Carbon::parse($data['timestamp'])->isoFormat('YYYY/MM/DD HH:mm'),
                    'card_number' => $data['card']['bin'].'xxxxxx'.$data['card']['last4Digits'],
                    'customer_id' => auth()->user()->id,
                ]);
            }



            return back();

        }

        return "An error occurred, please try again ";

//        return response()->json(json_decode($response->getBody(), true));
    }

    public function chekoutpayments(Request $request, $price)
    {

        $paymentMethodType = $request->get('paymentMethodType');
        session()->put('paymentMethodType', $paymentMethodType);

        $httpClient = new Client([
            'base_uri' => 'https://test.oppwa.com/'
        ]);


        $response = $httpClient->request('post', '/v1/checkouts', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
            ],
            'form_params' => [
                'entityId' => ($paymentMethodType === 'mada') ? $this->madaEntityID : $this->visaEntityID,
                'amount' => $price,
                'currency' => $this->currencyISO,
                'paymentType' => 'DB',
                'merchantTransactionId' => Str::random(10),
                'testMode' => 'EXTERNAL',
                'customer.givenName' => auth()->user()->name,
                'customer.sex' => 'F',
            ]
        ]);


        $res = json_decode($response->getBody(), true);

        $view = view('ajax.form')->with(['responseData' => $res, 'id' => $price])->renderSections();

        return response()->json(['status' => true, 'content' => $view['main']]);


    }


}
