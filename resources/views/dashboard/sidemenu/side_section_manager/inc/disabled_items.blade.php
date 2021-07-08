<div class="panel panel-danger">
    <div class="panel-heading">
        <strong>Disabled Items</strong>
    </div>

    <div class="panel-body clearfix">
        <ul class='draggable-menu draggable-menu-inactive' id="sectionId_{{$sectionId}}">
            @php
                $menus = \App\Helpers\MenuHelper::disabledMenus($model);
            @endphp
            @if(count((array)$menus) > 0)
                @foreach($menus as $menu)
                    @if(!is_null($menu))
                    <li data-id='{{$menu->id}}' data-name='{{$menu->name}}' data-section="{{$sectionId}}">
                        <div>
                            {{$menu->name}}
                            <span class='pull-right'>

                            </span>
                            <br/>
                            <em class="text-muted">
                                <small>
                                    <i class="fa fa-users"></i>
                                    &nbsp; @php $rolesArray = []; @endphp
                                    @foreach($menu->roles()->get() as $role)
                                        @php array_push($rolesArray, $role->name) @endphp
                                    @endforeach {{implode(', ', $rolesArray)}}
                                </small>
                            </em>
                        </div>
                    </li>
                    @endif
                @endforeach
            @endif
        </ul>
        @if(count((array)\App\Helpers\MenuHelper::disabledMenus($model))==0)
            <div align="center" id='inactive_text_sectionId_{{$sectionId}}' class='text-muted'>Disabled item is empty</div>
        @endif
    </div>
</div>
