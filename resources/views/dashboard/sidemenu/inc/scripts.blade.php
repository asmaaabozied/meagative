<script src="{{ asset('dashboard_files/js/jquery-sortable.js') }}"></script>
<script type="text/javascript">
    $(function () {
        var sortactive = $(".draggable-menu").sortable({
            group: '.draggable-menu',
            delay: 200,
            isValidTarget: function ($item, container) {
                var depth = 1, // Start with a depth of one (the element itself)
                    maxDepth = 3,
                    children = $item.find('ul').first().find('li');
                // Add the amount of parents to the depth
                depth += container.el.parents('ul').length;
                // Increment the depth for each time a child
                while (children.length) {
                    depth++;
                    children = children.find('ul').first().find('li');
                }
                return depth <= maxDepth;
            },
            onDrop: function ($item, container, _super) {
                var sectionId = '';
                var isActive = 0;
                var data = '';
                var jsonString = '';
                if ($item.parents('ul').hasClass('draggable-menu-active')) {
                    sectionId = $item.parents('ul').attr('id');
                    isActive = 1;
                    data = $('#'+sectionId).sortable("serialize").get();
                    jsonString = JSON.stringify(data, null, ' ');
                    $('#empty_active_text_'+sectionId).remove();
                } else {
                    sectionId = $item.parents('ul').attr('id');
                    isActive = 0;
                    data = $('#'+sectionId).sortable("serialize").get();
                    jsonString = JSON.stringify(data, null, ' ');
                    $('#inactive_text_'+sectionId).remove();
                }
                sectionId = $item.parents('ul').attr('id');
                $.post("@if(\Illuminate\Support\Str::contains($model, 'SideMenuItem')) \
                            {{route('dashboard.save.menu.item')}} \
                            @elseif(\Illuminate\Support\Str::contains($model, 'SideMenuSection')) \
                            {{route('dashboard.save.section.item')}}@endif", {
                    menus: jsonString,
                    isActive: isActive,
                    section: sectionId
                }, function (resp) {
                    $('#menu-saved-info_'+sectionId).fadeIn('fast').delay(1000).fadeOut('fast');
                });
                _super($item, container);
            }
        });
    });
</script>
