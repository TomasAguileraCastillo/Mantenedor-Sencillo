<?php
require 'header.php';
?>
<!--Contenido-->

                  <br>
                  <div class="container">
                    <section class="content">
                        <div class="row">
                          <div class="col-md-12">
                              <div class="box">
                                <div class="box-header with-border">
                                      
                                        <button class="btn btn-success" 
                                                id="btnagregar" 
                                                onclick="mostrarform(true)">
                                                <i class="bi bi-plus-circle"></i> Agregar  
                                                
                                        </button> 

                                      
                                </div>
                              </div>
                          </div>
                        </div>
                    </section>
                  </div>


                   <!--inicio de Formulario-->

                   <div class="container">
                   <div class="panel-body" id="formularioregistros">

                   <div class="message">
                    <p id="alerta">
                      <span id="mensaje"></span>
                    </p>
                   </div>

                      <form class="row g-3" name="formulario" id="formulario" method="POST">
                        <div class="col-md-2">
                          <label  class="form-label">Rut</label>
                          <input type="hidden" name="idpersonal" id="idpersonal">
                          
                          <!--<input 
                                type="text" 
                                class="text form-control" 
                                name="rut" id="rut" 
                                maxlength="10"
                                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
-->
                               
                         <input
                                maxlength="12"
                                name="rut"
                                id="rut"
                                type="text"
                                class="text form-control"
                                placeholder="Ingrese un RUT"
                                onkeypress="return isNumber(event)"
                                oninput="checkRut(this)"
                                required=""/>
        

                        </div>                          
                        <div class="col-md-4">
                          <label for="inputPassword4" class="form-label">Nombre</label>
                          <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-md-4">
                          <label for="inputPassword4" class="form-label">Apellido</label>
                          <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail4">
                          </div>
                        <div class="col-3">
                          <label for="inputAddress" class="form-label">Telefono</label>
                          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="col-12">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="inputAddress" class="form-label">cargar archivo</label>
                              <input  type="file" class="form-control" 
                                      name="imagen" 
                                      id="imagen" 
                                      accept="image/x-png,image/gif,image/jpeg">
                              <input  type="hidden" 
                                      name="imagenactual" 
                                      id="imagenactual">
                            </div>
                            <div class="col-md-6 ">
                              <label  class="form-label">Foto</label>
                              <img    src="" 
                                      width="150px" 
                                      height="120px" 
                                      id="imagenmuestra">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label for="inputCity" class="form-label">Comentarios</label>
                          <textarea type="text" class="form-control" aria-label="With textarea"></textarea>
                        </div>
                      
                        
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar">
                                    <i class="fa fa-save"></i> Guardar
                            </button>

                            <button class="btn btn-danger" 
                                    onclick="cancelarform()" 
                                    type="button">
                                    <i class="fa fa-arrow-circle-left"></i> Cancelar
                            </button>
                          </div>
                      </form>
                   </div>
                  </div>
                <!--fin form-->             
      





                    <!-- centro -->

                    <br>
                    <div class="container">
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-condensed table-hover ">
                          <thead>
                            <th>Opciones</th>
                            <th>Rut</th>  
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Foto</th>
                            <th>Comentarios</th>
                            <th>Condicion</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Rut</th>  
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Foto</th>
                            <th>Comentarios</th>
                            <th>Condicion</th>
                          
                          </tfoot>
                        </table>
                    </div>
                  </div>



<!-- Content here -->
<!--
<div class="container">
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Rut(*):</label>
                            <input type="hidden" name="idarticulo" id="idarticulo">
                            <input type="text" 
                                    class="form-control"
                                    name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre(*):</label>
                            <input type="hidden" name="idarticulo" id="idarticulo">
                            <input type="text" 
                                    class="form-control"
                                    name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                          </div>
                         
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Categoría(*):</label>
                            <select   id="idcategoria" 
                                      name="idcategoria" 
                                      class="form-control selectpicker"
                                      data-live-search="true" 
                                      required>
                            </select>
                          </div>
                         
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Stock(*):</label>
                            <input type="number" class="form-control" name="stock" id="stock" required>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripción:</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
                          </div>
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Imagen:</label>
                            <input  type="file" class="form-control" 
                                    name="imagen" 
                                    id="imagen" 
                                    accept="image/x-png,image/gif,image/jpeg">
                            <input  type="hidden" 
                                    name="imagenactual" 
                                    id="imagenactual">
                            
                            <img    src="" 
                                    width="150px" 
                                    height="120px" 
                                    id="imagenmuestra">
                          </div>
                          
                          
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar">
                                    <i class="fa fa-save"></i> Guardar
                            </button>

                            <button class="btn btn-danger" 
                                    onclick="cancelarform()" 
                                    type="button">
                                    <i class="fa fa-arrow-circle-left"></i> Cancelar
                            </button>
                          </div>
                        
                        </form>
                    </div>
-->
                    <!--Fin centro -->
                    </div>
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
</div>
  <!--Fin-Contenido-->
  <br>

<?php
require 'footer.php';
?>
<script>
new DataTable('#tbllistado', {
    responsive: true
});
</script>
<script src="scripts/validador.js"></script>
<script type="text/javascript" src="scripts/personal.js"></script>


