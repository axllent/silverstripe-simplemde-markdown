(function($) {
    $.entwine('ss', function($) {
        $('textarea.simplemdeeditor').entwine({
            onmatch: function() {
                var _self = $(this);
                var simplemde = new SimpleMDE({
                    element: document.getElementById(_self.attr('id')),
                    hideIcons: ["side-by-side", "fullscreen"]
                });
                simplemde.codemirror.on('change', function() {
                    _self.val(simplemde.value()).change();
                });
            }
        });
    });
})(jQuery);