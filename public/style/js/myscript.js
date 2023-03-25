function check_delete () {
    if (window.confirm("Do you want to delete it? Can't recover data ")) {
        return true;
    }

    return false;
}