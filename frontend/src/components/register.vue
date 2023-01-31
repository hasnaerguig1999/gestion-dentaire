<template>
  
  <div class="container" id="app">
         <div class="container">
            <h4 class="text-success">Login Example In VueJs And PHP</h4>
            <div class="panel panel-primary">
               <div class="panel-heading">Login Example In VueJs And PHP</div>
               <div class="panel-body">
                  <div class="form-group">
                     <label class="control-label col-sm-2">reff:</label>
                     <div class="col-sm-5">
                        <input class="form-control" type="text" name="first_name" v-model="reff" >
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2">  </label>
                     <div class="col-sm-5">
                        <input type="button" @click='login();' value="Login" class="btn btn-primar">                      
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</template>

<script>
  
export default {
  name: "RegistreView",
  data(){
    return{
          clients : [],
        //   randezs : [],
          client : {id : '',firstname : '',lastname : '',proff : '',age : '',reff : '',CRN : '',RDV : '',clientId : ''},
          reff :""
      
    }
  },
  methods: {
      async login() {
     if (this.reff != '' ) {
      let respon = await axios.post('http://localhost/management-rdv/backend/api/clients/login.php', {
        reff: this.reff
       })
       .then(function(respon) {
        console.log(respon.data.response);
        console.log(respon.data.datacl);
        if (respon.data.response == 1) {
         alert('Login Successfully');
        // window.location.href = 'https://phpforever.com/vuejs/login-example-in-vuejs-and-php/'
        } else {
         alert("User does not exist");
        }
       });
     } else {
      alert('Please enter reff');
     }
    }
   }
};

</script>

<style >
</style>