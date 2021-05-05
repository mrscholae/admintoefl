<?php $this->load->view("_partials/header");?>

    <div class="notification">
    </div>
    <div class="row">
        <div class="col-4">
            <div class="msg-closing">
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-start mb-3">
        <a href="<?= base_url()?>tes/list_hard/<?= $id?>" target="_blank" class="btn btn-sm btn-success mr-3">List Hard File</a>
        <a href="<?= base_url()?>tes/list_soft/<?= $id?>" target="_blank" class="btn btn-sm btn-success">List Soft File</a>
    </div>
    <div class="card shadow mb-4" style="max-width: 1100px">
        <div class="card-body">
            <div id="reload">
                <table id="dataTable" class="table table-sm cus-font">
                    <thead>
                        <tr>
                            <th ><center>No</center></th>
                            <th >Nama Peserta</th>
                            <th >L</th>
                            <th >S</th>
                            <th >R</th>
                            <th >Nilai</th>
                            <th >Sertifikat</th>
                            <th >Sertifikat Polosan</th>
                            <th >Sertifikat Full</th>
                            <th >Detail</th>
                            <th >Link</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

<!-- load modal -->
<?php 
    if(isset($modal)) :
        foreach ($modal as $i => $modal) {
            $this->load->view("_partials/modal/".$modal);
        }
    endif;
?>

<!-- load javascript -->
<?php  
    if(isset($js)) :
        foreach ($js as $i => $js) :?>
            <script src="<?= base_url()?>assets/js/<?= $js?>"></script>
            <?php 
        endforeach;
    endif;    
?>

<!-- $this->load->view("_partials/modal");?> -->
<?php $this->load->view("_partials/footer");?>