function changePerSize($size)
{
$this->pageSize = $size;
}

function set_active($path, $active = 'nav-active') {

return call_user_func_array('Request::is', (array)$path) ? $active : '';

}