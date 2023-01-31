<template>
<NavBarDash />
  <div class="container1">
  <!-- <h2>Responsive Tables Using LI <small>Triggers on 767px</small></h2> -->
  <h2>Clients Table</h2>
  <!-- <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">First name</div>
      <div class="col col-2">Last name</div>
      <div class="col col-3">job</div>
      <div class="col col-4">Age</div>
      <div class="col col-5">Reference</div>
      <div class="col col-6">Date time</div>
      <div class="col col-7">Date</div>
      <div class="col col-8">Action</div>
    </li>
    <li class="table-row" v-for="client in clients" :key="client.id">
      <div style="display: flex;width: 100%;align-items: center;">
        <div v-for="data in Object.values(client).slice(1)" class="col col-1" data-label="First name">
          <input :type="(modifier == client.id)? 'text' : 'submit'" :value="data"></div>
        <div class="col col-8 action-icon" data-label="Action">
          <div v-if="modifier == client.id"><input style="background-color: green;color: white;border-radius: 7px;padding: 8px 11px;width: 80px;" type="button" @click="updateclient(client.id,$event)" value="Save" ></div>
          <i v-if="modifier != client.id" class="fa-solid fa-pen" @click="changeType(client.id)"></i>
          <i v-if="modifier != client.id" class="fa-solid fa-trash-can" @click="deleteclient(client.id)"></i>
        </div>
      </div>
    </li>
  </ul> -->

  <table class="table">
  <thead>
    <tr>
     
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">job</th>
      <th scope="col">Age</th>
      <th scope="col">Reference</th>
      <th scope="col">Date time</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody >
    <tr v-for="client in clients" :key="client.id" >
        <td v-for="data in Object.values(client).slice(1)">{{data}}</td>
        
        <td>
          <!-- <input :type="(modifier == client.id)? 'text' : 'submit'" :value="data"></div> -->
          <div v-if="modifier == client.id">
          <input style="background-color: green;color: white;border-radius: 7px;padding: 8px 11px;width: 80px;" type="button" @click="updateclient(client.id,$event)" value="Save" ></div>
          <i v-if="modifier != client.id" class="fa-solid fa-pen " @click="changeType(client.id)"></i>
          <i v-if="modifier != client.id" class="fa-solid fa-trash-can" @click="deleteclient(client.id)"></i>
        </td>
    </tr>
    <tr>
     
    </tr>
  </tbody>
</table>
</div>
 <Footer />
</template>

<script>

import NavBarDash from "../components/NavBarDash.vue"
import Footer from "../components/Footer.vue";


export default {
  name: "Dashboard",
  components: {
    NavBarDash,Footer
  },
  data(){
    return{
      type: 'text',
      display : "display: block;",
      clients : [],
      randezs : [],
      modifier: null,
      checkDelete: null,
      randez : {id : ''},
    }
  },
  created() {
        this.getclients();
  },
  methods:{
    changeType(id){
      this.modifier = id;
    },
    Save(){
      this.type= 'submit';
      this.typeHidden= 'hidden';
      this.display = "display: block;"
      
    },
    getclients(){
            axios.get('http://localhost/architecte/backend/api/clients/read.php')
                .then( (response) => {
                  this.clients = [...response.data]

                })
                .catch(err => console.log(err));
    },
        deleteclient(id){
            Swal.fire({
                title: 'Are you sure ?',
                text: "You are going to delete this client",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'black',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText : 'Cancel'
            }).then((result) => {
                if (result.value) {
                    axios.delete('http://localhost/architecte/backend/api/randez/delete.php?id=' + id)
                        // consol.log(client.id);
                        .then(() => {
                            Swal.fire(
                                'Deleted !',
                                'success'
                            ).then(() => {
                                this.clients = this.clients.filter(client => {
                                    return client.id !== id;
                                })
                            })
                        })
                        .catch(err => console.log(err));
                }
            })
        },
        addclient(id){
            if(this.client.RDV !== '' && this.client.CRN !== '' && this.client.clientId !== ''){
                axios.post('http://localhost/architecte/backend/api/randez/create.php',{
                    RDV : this.client.RDV,
                    CRN : this.client.CRN,
                    clientId :this.client.clientId
                })
                .then(() => {
                    Swal.fire(
                        'Added !',
                        'success'
                    ).then(() => {
                        this.getclients();
                        ('#addclient').modal('hide')
                    })
                })
                .catch(err => console.log(err));
            }else{
                Swal.fire({
                    title : 'Please fill all the fields !',
                    type : 'warning'
                }).then(() => {
                    ('#addclient').modal('show')
                })
            }
        },
        updateclient(id,event) {
            let day = event.target.parentElement.parentElement.parentElement.children[5].firstElementChild.value;
            let time = event.target.parentElement.parentElement.parentElement.children[6].firstElementChild.value;
            console.log(day,time);
            axios.put('http://localhost/architecte/backend/api/randez/update.php', {
              id : id,
                CRN: day,
                RDV: time
            }).then(() => {
              Swal.fire(
                'Updated !',
                        'success'
                    ).then(() => {
                      this.getclients(); 
                        ('#updateclient').modal('hide')
                    })
                })
                .catch(err => console.log(err));
          this.modifier = null;
        },
        getclient(id) {
            axios.post('http://localhost/architecte/backend/api/clients/read_single.php?id=' + id)
                .then(response => { this.client = response.data;
  })
                .catch(err => console.log(err));
        },
        clearFields(){
            this.client = {id : '',CRN : '',RDV : ''};
        }
  }
};
</script>


<style scoped lang="scss">
  body {
  font-family: 'lato', sans-serif;
}
.container1 {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
  
}

h2 {
  font-size: 20px;
  margin: 30px 0;
  text-align: center;
  small {
    font-size: 0.5em;
  }
}

.responsive-table {
  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
    align-items: center;
    .message{
      width: 100%;
      text-align: center;
      color: lawngreen;
    }
  }
  .table-header {
    background-color: #68d391;
    color: white;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.003em;
  }
  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
    .action-icon{
      #button{

      }
    }
    input{
      background-color: transparent;
      border: none;
      width: 100%;
    }
  }
  .action-icon{
    display: flex;
    justify-content: space-evenly;
  }
  .col-1 {
    flex-basis: 15%;
  }
  .col-2 {
    flex-basis: 15%;
  }
  .col-3 {
    flex-basis: 15%;
  }
  .col-4 {
    flex-basis: 10%;
  }
  .col-5 {
    flex-basis: 20%;
  }
  .col-6 {
    flex-basis: 15%;
  }
  .col-7 {
    flex-basis: 15%;
  }
  .col-8 {
    flex-basis: 15%;
  }
  
  @media all and (max-width: 767px) {
    .table-header {
      display: none;
      overflow-x: scroll;
    }
    .table-row{
      
    }
    li {
      display: flex;
    }
    .col {
      
      flex-basis: 100%;
      
    }
    .col {
      display: flex;
      padding: 10px 0;
      &:before {
        color: #6C7A89;
        padding-right: 10px;
        content: attr(data-label);
        flex-basis: 50%;
        text-align: right;
          overflow-x: scroll;
      }
    }
  }
}
</style>
