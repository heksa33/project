<?php $__env->startSection('title','Belajar Laravel'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="<?php echo e(url('/home')); ?>">Dashboard</a></li>
            <li class="active">Kategori</li>
        </ul>
        <p>
            <a href="<?php echo e(route('categories.create')); ?>"
            class="btn btn-primary modal-show">
                <span class="glyphicon glyphicon-plus"
                aria-hidden="true"></span> Tambah </a>
                <a href=""
                class="btn btn-success modal-show">
                    <span class="glyphicon glyphicon-print"
                    aria-hidden="true"></span>Print</a>
        </p>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Kategori</h2>
                </div>
                <div class="panel-body">
                    <table id="datatable" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th></th>
                            </tr>
                        </thead>
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $('#datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "<?php echo e(route('table.categories')); ?>",
        columns: [
        {data: 'DT_RowIndex', name: 'id'},
        {data: 'name', name: 'name'},
        {data: 'description', name: 'description'},
        {data: 'action', name: 'action'},
        ]
    })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>