<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-5">
        </div>
        <div class="col-sm-4 float-sm-right">
            <h1>Ajouter Une Annonce</h1>
        </div>
        <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Ajouter-annonce</li>
            </ol>
        </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
      <div class="col-md-4"></div>
    <div class="col-md-8">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Information de l'Annonce</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="inputName">Titre de l'Annonce</label>
            <input type="text" id="inputName" class="form-control">
          </div>
          <div class="form-group">
            <label for="inputDescription">Contenu de l'Annonce</label>
            <textarea id="inputDescription" class="form-control" rows="4"></textarea>
          </div>
            <div class="form-group">
                <label>Date d'ajout:</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Image de l'Annonce</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Coisir l'image</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

      <!-- /.card -->
    </div>
  </div>
  <div class="row">
      <div class="col-4 justify-content-center">
      </div>
      <div class="col-8">
          <a href="#" class="btn btn-secondary toastrDefaultWarning">Annuler</a>
          <input type="submit" value="Creer l'annonce" class="btn btn-success float-right toastrDefaultSuccess">
      </div>
  </div>
</section>