
  <div id="firmware-item">
    <div v-for="firm in firmwares" :key="firm.id">
      <template>
        <div class="item">
            <div class="pad15">
                <p class="lead">{{firm.manufacture}}</p>
                <p class="lead">{{firm.model}}</p>
                <img class="img-fluid" src="">

                <a href="#" class="btn btn-primary">Edit</a>
            </div>
        </div>
      </template>
    </div>
  </div>


<script>
  export default {
    data(){
      firmwares:null
    },
    mounted(){
      axios
        .get('http://127.0.0.1:8000/firmware/listar')
        .then(response =>(this.firmwares = response.data))
    }

  }
</script>
