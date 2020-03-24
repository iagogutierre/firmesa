<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                  <form method="post" :action=":route('redes.store')">
                      @csrf
                      <div class="form-group">
                          <label for="firmware_id">Firmware:</label>
                          <table class="table table-striped">
                              <thead>
                                  <tr>
                                    <td>Modelo</td>
                                    <td>Versão</td>
                                    <td>Ações</td>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($firmwares as $firm)
                                  <tr v-bind:id="'linha'+{{$firm->id}}">
                                      <td>{{$firm->model}}</td>
                                      <td>{{$firm->version}}</td>
                                      <td>
                                          <button type="button" v-on:click="addFirmware('linha'+{{$firm->id}}, {{$firm->id}})">+</button>
                                          <!-- <a href="{{ route('firmwares.edit',$firm->id)}}" class="btn-sm btn-primary">Editar</a> -->
                                      </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>


                      <div class="form-group">
                        <input type="checkbox" id="jack" value="Jack" v-model="firmInMesh">
                        <label for="jack">Jack</label>
                        <input type="checkbox" id="john" value="John" v-model="firmInMesh">
                        <label for="john">John</label>
                        <input type="checkbox" id="mike" value="Mike" v-model="firmInMesh">
                        <label for="mike">Mike</label>
                        <br>
                        <span>Nomes assinalados: {{firmInMesh}}</span>

                      </div>

                      <div class="form-group">
                          <label for="bssid">BSSID:</label>
                          <input type="text" class="form-control" name="bssid"/>
                      </div>

                      <div class="form-group">
                          <label for="location">Localização:</label>
                          <input type="text" class="form-control" name="location"/>
                      </div>
                      <div class="form-group">
                          <label for="users_attended">Usuaários atendidos:</label>
                          <input type="text" class="form-control" name="users_attended"/>
                      </div>
                      <div class="form-group">
                          <label for="nodos">Nós:</label>
                          <input type="text" class="form-control" name="nodos"/>
                      </div>
                      <div class="form-group">
                          <label for="equipament">Equipamentos:</label>
                          <input type="text" class="form-control" name="equipament"/>
                      </div>
                      <div class="form-group">
                          <label for="gateway">Gateway:</label>
                          <input type="text" class="form-control" name="gateway"/>
                      </div>
                      <button type="submit" class="btn btn-primary-outline">Cadastrar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default{
  data :{
    firmInMesh: []
  },
  methods: {
    addFirmware: function($l, $id){
      let line = $l;

      this.firm_in_mesh.push($id);
      // $('#'+nome).remove()
      console.log(this.firm_in_mesh);
    }
  }
}
</script>
