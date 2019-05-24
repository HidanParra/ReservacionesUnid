<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-xs-12 col-md-6 offset-md-3">
        <div class="card">
          <div class="card-header">
            <strong>Formulario de registro de campus</strong> 
          </div>
          <div class="card-body card-block">
            <form v-on:submit.prevent="sendDataCampus" class="form-horizontal">
              
              <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nombre</label></div>
                <div class="col-12 col-md-9"><input v-model="selected.nombre" type="text" id="text-input" name="text-input" placeholder="Ingresa el nombre de tu universidad" class="form-control"><small class="help-block form-text">Por favor llena este campo</small></div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Campus</label></div>
                <div class="col-12 col-md-9"><input v-model="selected.campus" type="text" id="email-input" name="email-input" placeholder="Ingresa el campus" class="form-control"><small class="help-block form-text">Por favor llena este campo</small></div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Estado</label></div>
                <div class="col-12 col-md-9"><input v-model="selected.estado" type="text" id="email-input" name="email-input" placeholder="Ingresa estado" class="form-control"><small class="help-block form-text">Por favor llena este campo</small></div>
              </div>
                                          
              <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Tipo</label></div>
                <div class="col-12 col-md-9">
                  <select v-model="selected.tipo" name="select" id="select" class="form-control">
                    <option value="0" selected>Please select</option>
                    <option value="1">Preparatoria</option>
                    <option value="2">Universidad</option>                    
                  </select>
                </div>
              </div>                            
              <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
              <i class="fa fa-dot-circle-o"></i> Registrar
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
              <i class="fa fa-ban"></i> Reset
            </button>
          </div>
            </form>
          </div>          
        </div>

      </div>      
    </div>
  </div>
</template>

<script>
export default {
  name: 'forms',
  data(){
      return{
          selected:{
              nombre:'',
              campus:'',
              estado:'',
              tipo:''
          }
      }
  },
  methods: {
    click () {
      // do nothing
    },
    getDataCampus(){

    },
    sendDataCampus(){        
        console.log("enviando datos", this.selected);
        $.post(()=>{
            
        })
    }
  },
}
</script>


<style scoped>
  .input-group-addon {
    background-color: transparent;
    border-left: 0;
}
</style>