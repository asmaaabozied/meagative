<div class="panel panel-success">
    <div class="panel-heading">
        <strong>Active Items</strong>
        <span id='menu-saved-info_sectionId_{{$sectionId}}' style="display:none" class='pull-right text-success'>
                            <i class='fa fa-check'></i> Item Saved
                        </span>
    </div>

    <div class="panel-body clearfix">
        <ul class='draggable-menu draggable-menu-active' id="sectionId_{{$sectionId}}">
            @if(count((array)$activeMenus) > 0)
            @foreach($activeMenus as $menu)
                <li data-id='{{$menu->id}}' data-name='{{$menu->name}}' data-section="{{$sectionId}}">
                    <div>
                        <i class='fa {{$menu->icon}}'></i> {{$menu->name}}
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
                        <em class="text-muted">
                            <small>
                                <i class="fa fa-list"></i>
                                &nbsp; {{$menu->section()->first()->name}}
                            </small>
                        </em>
                    </div>
                    <ul id="sectionId_{{$sectionId}}">
                        @if($menu->children)
                            @foreach($menu->children as $child)
                                <li data-id='{{$child->id}}' data-name='{{$child->name}}' data-section="{{$sectionId}}">
                                    <div>
                                        <i class='fa {{$child->icon}}'></i> {{$child->name}}
                                        <span class='pull-right'>

                                        </span>
                                        <br/>
                                        <em class="text-muted">
                                            <small>
                                                <i class="fa fa-ban"></i>
                                                &nbsp; @php $rolesArray = []; @endphp
                                                @foreach($child->roles()->get() as $role)
                                                    @php array_push($rolesArray, $role->name) @endphp
                                                @endforeach {{implode(', ', $rolesArray)}}
                                            </small>
                                        </em>
                                    </div>
                                    <ul id="sectionId_{{$sectionId}}">
                                        @if($child->children)
                                            @foreach($child->children as $subChild)
                                                <li data-id='{{$subChild->id}}' data-name='{{$subChild->name}}' data-section="{{$sectionId}}">
                                                    <div>
                                                        <i class='fa {{$subChild->icon}}'></i> {{$subChild->name}}
                                                        <span class='pull-right'>

                                                        </span>
                                                        <br/>
                                                        <em class="text-muted">
                                                            <small>
                                                                <i class="fa fa-ban"></i>
                                                                &nbsp; @php $rolesArray = []; @endphp
                                                                @foreach($subChild->roles()->get() as $role)
                                                                    @php array_push($rolesArray, $role->name) @endphp
                                                                @endforeach {{implode(', ', $rolesArray)}}
                                                            </small>
                                                        </em>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </li>
            @endforeach
            @endif
        </ul>

        @if(count((array)$activeMenus)==0)
            <div align="center" id="empty_active_text_sectionId_{{$sectionId}}">Active items is empty, please add new item</div>
        @endif
    </div>

</div>
