<template>
<NavBarRdv />
  <main>
    <div class="container">
      <div class="image_section">
        <img src="../assets/images/security.svg" alt="" />
      </div>
      <form id="form-rdv" action="">
        <div v-if="showDiv == 1">
          <label for="">Reference</label>
          <input
            type="text"
            id="referance-id"
            placeholder="Enter votre ref..."
            required
            v-model="dayRDV.reff"
          />
          <input type="submit" @click.prevent="HelloMsg" value="Submit" />
        </div>

        <div class="dateRDV" v-if="showDiv == 2">
          <h3>Welcome Mr Zouhair begdar</h3>
          <label for="start">jour</label>
          <input
            type="date"
            id="start"
            name="trip-start"
            :min="new Date().toISOString().substring(0, 10)"
            max="2030-12-31"
            @change="checkRDV"
            v-model.lazy="dayRDV.RDV"
          />
          <label for="">Heure</label>
          <select name="" id="" v-model="dayRDV.CRN">
            <option value="" selected >choiser une heure</option>
            <option v-for="CRN in availableCRNs" :value="CRN">{{CRN}}</option>
          </select>
          <input type="submit" @click="addRDV" value="Submit" />
        </div>

        <div v-if="showDiv == 3">
          <div class="success">
            <i class="fa-regular fa-circle-check"></i>
            <h3>Successfully</h3>
            <p>
              Your date de RDV is :
              <b style="color: black">le {{dayRDV.RDV}} , de {{dayRDV.CRN}} </b>
            </p>
          </div>
        </div>

        <div v-if="showDiv == 4">
          <div class="success">
            <i class="fa-light fa-exclamation" style="color: red"></i>
            <h3 style="color: red">Ref not founded</h3>
            <input type="button" style="margin-top:10%;border:none;width:30%;border-radius:5px;background-color: black;color:white;padding: 5px 10px;" @click="tryAgain" value="Try again" />
          </div>
        </div>
      </form>
    </div>
  </main>
  <Footer />
</template>




<script>

import NavBarRdv from '../components/NavBarRdv.vue';
import Footer from '../components/Footer.vue';

const CRNs = ["10 h à 10:30h","11 h à 11:30h","14 h à 14:30h","15 h à 15:30h","16 h à 16:30h"]
export default {
  name: "RegistreView",
  data() {
    return {
      showDiv: 1,
      RdvCondition: true,
      today : null,
      dayRDV: {
        reff: "",
        RDV: "",
        CRN: ""
      },
      availableCRNs : [],
    };
  },
  components: {
    NavBarRdv,
    Footer 
  },
  mounted()
  {
    this.availableCRNs=CRNs.filter(this.filterrdv)
  },
  methods: {
      async HelloMsg() {   
      
      if (this.dayRDV.reff != '' ) {
      let respon = await axios.post('http://localhost/architecte/backend/api/clients/loginClient.php', {
        reff: this.dayRDV.reff
      });

      console.log(respon);
      this.RdvCondition = respon.data.response;

        if (this.RdvCondition) {
          var today = new Date();
          this.today = today.getFullYear() + '-' + (today.getMonth()+1) + '-' + today.getDate();

          this.showDiv = 2;

        } else {
        this.showDiv = 4;
        }

    } else {
      alert('Please enter reff');
    }
    },
   filterrdv(timeofrdv)
    {
        const d=new Date();
        const d2=new Date(this.dayRDV.RDV)
        if(d2.getTime()>d.getTime())
          return true
        let h=d.getHours();
        console.log(timeofrdv.split(" ")[0]+"             ")
        console.log(h)
        timeofrdv=timeofrdv.split(" ")[0];
        return timeofrdv>h;
    },
    async checkRDV(){
      
      let respo = await axios.post("http://localhost/architecte/backend/api/randez/checkRDV.php", {
        RDV: this.dayRDV.RDV
      });
        if(!respo.data.response){
            console.log(this.dayRDV.RDV)
            const test=CRNs.filter(this.filterrdv);
           this.availableCRNs = test;
           

           }
        else {
          console.log(this.dayRDV.RDV)
          const test=CRNs.filter(this.filterrdv);
          this.availableCRNs = test.filter(e => !respo.data.data.includes(e));        
        }

    },
    addRDV() {
        axios.post("http://localhost/architecte/backend/api/randez/create.php", {

            RDV: this.dayRDV.RDV,
            CRN: this.dayRDV.CRN,
            reff: this.dayRDV.reff,

    });
      this.showDiv = 3;
    },
    tryAgain(){
        this.showDiv = 1;
    }

  },
};
</script>


<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Parisienne&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500&display=swap");

/* form  */

main {
  margin-top: 10%;
  height: auto;
  margin: 5% 10% 5% 10%;
  padding: 0 2% 0 2%;
  display: flex;
  justify-content: center;
}

.container {
  height: 500px;
  // padding: 100px 0;
  width: 80%;
  display: flex;
  border-radius: 15px;
  background: #ffffff;
  box-shadow: 15px 15px 40px #b3b3b3, -15px -15px 40px #ffffff;
}

.container .image_section {
  width: 100%;
}

.container .image_section img {
  width: 100%;
  height: 100%;
  border-radius: 15px 0 0 15px;
}

.container form {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  padding: 0 3% 0 3%;
  justify-content: center;
  align-content: center;
  background-color: #f7f9f9;
  border-radius: 0 15px 15px 0;
  font-family: "Hind", sans-serif;
  .dateRDV {
    h3 {
      text-align: center;
      margin-bottom: 4%;
    }
  }
  .success {
    display: flex;
    flex-direction: column;
    align-items: center;
    i {
      font-size: 10rem;
      color: #45a049;
      margin-bottom: 5vh;
      align-items: center;
    }
    h3 {
      color: #45a049;
    }
  }
  .reservation {
    margin-top: 51px;
    label {
      font-weight: 600;
      margin-left: 29%;
    }
    input {
      margin-top: 30px !important;
    }
  }
}

.container form input[type="text"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.container form input[type="date"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.container form input[type="number"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.container form select {
  width: 100%;
  padding: 12px 0px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-size: 16px;
  color: #555555;
}

.container form input[type="submit"] {
  width: 100%;
  background-color: #68d391;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.container form input[type="submit"]:hover {
  background-color: #6b8eba;
}

 @media all and (max-width: 767px) {
  .container {
  // height: 500px;
  // padding: 100px 0;
  width: 80%;
  display: block;
  border-radius: 15px;
  background: #ffffff;
  box-shadow: 15px 15px 40px #b3b3b3, -15px -15px 40px #ffffff;
}
#form-rdv{
  height: auto;
}

}
</style>
