<template>
  <NavBarClient />
  <div class="container">
    <div class="calendar">
      <div class="calendar__picture">
        <h2>18, Sunday</h2>
        <h3>November</h3>
      </div>
      <div class="calendar__date">
        <div class="container1">
      <!-- <h2>Responsive Tables Using LI <small>Triggers on 767px</small></h2> -->
      <ul class="responsive-table">
        <h2>Welcome to your appointment</h2>
        <li class="table-header">
          <div class="col col-1">Date time</div>
          <div class="col col-2">Date</div>
          <div class="col col-3">Action</div>
        </li>
        <li class="table-row" v-for="RDV in RDVs" :key="RDV.id">
            <div style="display: flex;width: 100%;align-items: center;">
              <div class="col col-1" data-label="First name">
                <input :type="(modifier == RDV.id)? 'text' : 'submit'" :value="RDV.CRN">
              </div>
              <div class="col col-1" data-label="First name">
                <input :type="(modifier == RDV.id)? 'text' : 'submit'" :value="RDV.RDV">
              </div>
                <div class="col col-8 action-icon" data-label="Action">
                <div v-if="modifier == RDV.id"><input style="background-color: green;color: white;border-radius: 7px;padding: 8px 11px;width: 80px;" type="button" @click="updateclient(RDV.id,$event)" value="Save" ></div>
                <i v-if="modifier != RDV.id" class="fa-solid fa-pen" @click="changeType(RDV.id)"></i>
                <i v-if="modifier != RDV.id" class="fa-solid fa-trash-can" @click="deleteclient(RDV.id)"></i>
              </div>
            </div>
        </li>
      </ul>
    </div>
      </div>
    </div>
  </div>
  
</template>


<script>
import NavBarClient from "../components/NavBarClient.vue";

import Cookies from 'vue-cookies';

export default {
  name: "ClientPage",
  components: {
    NavBarClient,
   
  },
  data(){
    return{
      type: 'text',
      display : "display: block;",
      RDVs : [],
      randezs : [],
      modifier: null,
      checkDelete: null,
      randez : {id : ''},
     
      // Cookies.set('refference',this.reff.ClientReff);
      //     console.log(Cookies.get('refference'));
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
            axios.post('http://localhost/architecte/backend/api/randez/read.php',{
              reff : Cookies.get('refference')
            })
                .then( (response) => {

                  console.log(response.data);
                  this.RDVs = response.data

                })
                .catch(err => console.log(err));
    },

   
        deleteclient(id){ 
            Swal.fire({
                title: 'Are you sure ?',
                text: "You are going to delete this randez vous",
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
                                this.RDVs = this.RDVs.filter(RDV => {
                                    return RDV.id !== id;
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
            let day = event.target.parentElement.parentElement.parentElement.children[0].firstElementChild.value;
            let time = event.target.parentElement.parentElement.parentElement.children[1].firstElementChild.value;
            console.log(day,time);
            this.modifier = null;
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
.container {
  width: 100%;
  display: flex;
  justify-content: center;
}

.calendar {
  position: relative;
  width: 60%;
  background-color: #fff;
  box-sizing: border-box;
  box-shadow: 0 5px 50px rgba(#000, 0.5);
  border-radius: 8px;
  overflow: hidden;
  margin: 5% 0;
}

@media (max-width: 800px) {
  .calendar {
    width: 90%;
  }
  .table-row {
    
  }
}

.calendar__picture {
  position: relative;
  height: 100px;
  padding: 20px;
  color: #fff;
  background: #1c2517;
  text-shadow: 0 2px 2px rgba(#000, 0.2);
  box-sizing: border-box;

  &::before {
    content: "";
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    position: absolute;
    background-color: #1c1d1c;
  }

  h2 {
    margin: 0;
  }

  h3 {
    margin: 0;
    font-weight: 500;
  }
}

.calendar__date {
  padding: 10px;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(25px, 1fr));
  grid-gap: 10px;
  box-sizing: border-box;
  height: 100vh;
}

.calendar__day {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 25px;
  font-weight: 600;
  color: #262626;

  &:nth-child(7) {
    color: #ff685d;
  }
}

.calendar__number {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 25px;
  color: #262626;

  &:nth-child(7n) {
    color: #ff685d;
    font-weight: 700;
  }

  &--current,
  &:hover {
    background-color: #009688;
    color: #fff !important;
    font-weight: 700;
    cursor: pointer;
  }
}

//dashboard client

// .container1 {
//   margin-left: auto;
//   margin-right: auto;
//   padding-left: 10px;
//   padding-right: 10px;
//   width: 100%;
// }

h2 {
  font-size: 20px;
  margin: 30px 0;
  text-align: center;
  small {
    font-size: 0.5em;
  }
}

.responsive-table {
  
    overflow-x: scroll;
  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
    align-items: center;
    
  }
  .table-header {
    background-color: #68d391;
    color: white;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.003em;
    padding-left: 70px;
  }
  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
    .action-icon {
      display: flex;
      justify-content: space-evenly;
      width: 50%;
      // padding-right: 6%;
      input {
        background-color: #68d391;
        color: white;
        border-radius: 7px;
        padding: 8px 11px;
        width: 80px;
      }
    }
    input {
      background-color: transparent;
      border: none;
      width: 100%;
    }
  }
  
  .col-1 {
    flex-basis: 35%;
  }
  .col-2 {
    flex-basis: 35%;
  }
  .col-3 {
    flex-basis: 30%;
  }

  // @media all and (max-width: 767px) {
  //   .table-header {
  //     display: none;
  //   }
  //   .table-row {
  //     padding: 4px 6px;
  //   }
  //   li {
  //     display: block;
  //   }
  //   .col {
  //     flex-basis: 100%;
  //   }
  //   .col {
  //     display: flex;
  //     padding: 10px 0;
  //     &:before {
  //       color: #6c7a89;
  //       padding-right: 10px;
  //       content: attr(data-label);
  //       flex-basis: 10%;
  //       text-align: right;
  //     }
  //   }
  // }

}

footer{
  margin-top: 0;
}
</style>