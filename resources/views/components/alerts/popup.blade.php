<div class="modal fade" id="deleteDialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">حذف</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cancelFun()"></button>
            </div>
            <div class="modal-body">
                <p>هل تريد حذف "<span class="item-name mb-3 fs-5"></span>" بالتأكيد؟</p>
            </div>
            <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" onclick="cancelFun()">إلغاء</button>
                    <div class="delete-btn">
                        <form id="dialog-form" method="POST" action="">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <button id="delete-btn" class="btn btn-danger"  title="حذف">حذف</i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>