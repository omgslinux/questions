jQuery(document).ready(function() {
    var $answersTable = $('#answers-container');
    var $collectionHolder = $answersTable.find('tbody');
    var $addLink = $('#add-answer');

    $collectionHolder.data('index', $collectionHolder.find('tr').length);

    $addLink.on('click', function(e) {
        e.preventDefault();

        var index = $collectionHolder.data('index');
        var prototype = $answersTable.data('prototype');
        var newForm = prototype.replace(/__name__/g, index);

        $collectionHolder.data('index', index + 1);

        var $newRow = $(newForm);
        $collectionHolder.append($newRow);
    });

    $collectionHolder.on('click', '.delete-answer', function(e) {
        e.preventDefault();

        $(this).parents('tr').remove();
    });
});