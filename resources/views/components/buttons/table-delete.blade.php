<!-- <button class="border-0 bg-transparent link-dark" -->
<button class="btn p-1"
    data-item-name="{{$name}}"
    data-item-action="{{$action}}"
    onclick="deleteFun(this.getAttributeNode('data-item-name').value, this.getAttributeNode('data-item-action').value)"  
    title="حذف">
    <i class="fa-solid fa-trash fa-fw"></i>
</button>