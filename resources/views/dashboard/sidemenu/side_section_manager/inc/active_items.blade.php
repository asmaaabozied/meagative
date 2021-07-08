<div class="panel panel-success">
    <div class="panel-heading">
        <strong>Active Items</strong>
        <span id='menu-saved-info_sectionId_{{$sectionId}}' style="display:none" class='pull-right text-success'>
                            <i class='fa fa-check'></i> Item Saved
                        </span>
    </div>

    <div class="panel-body clearfix">
        <ul class='draggable-menu draggable-menu-active' id="sectionId_{{$sectionId}}">
            @php
                $menus = \App\Helpers\MenuHelper::activeMenus($model);
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
                                    <i class="fa fa-ban"></i>
                                    &nbsp; @php $rolesArray = []; @endphp
                                    @foreach($menu->roles()->get() as $role)
                                        @php array_push($rolesArray, $role->name) @endphp
                                    @endforeach {{implode(', ', $rolesArray)}}
                                </small>
                            </em>
                            <br/>
                        </div>
                    </li>
                    @endif
                @endforeach
            @endif
        </ul>
        @if(count((array)\App\Helpers\MenuHelper::activeMenus($model))==0)
            <div align="center" id="empty_active_text_sectionId_{{$sectionId}}">Active items is empty, please add new item</div>
        @endif
    </div>
</div>
