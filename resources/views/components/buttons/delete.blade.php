<button class="btn btn-danger"
    data-item-name="{{$name}}"
    data-item-action="{{$action}}"
    onclick="deleteFun(this.getAttributeNode('data-item-name').value, this.getAttributeNode('data-item-action').value)"  
    title="حذف">
    <i class="fa-solid fa-trash fa-fw"></i>
    <span>حذف</span>
</button>