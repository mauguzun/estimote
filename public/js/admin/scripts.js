$('.delete_item').click(function () {
    if (confirm("Are you sure want to delete this item?")) {
        return true
    }

    return false;
});