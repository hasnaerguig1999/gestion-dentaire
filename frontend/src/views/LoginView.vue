<template>
<NavBar />
  <main>
    <div class="container">
      <div class="image_section">
        <img src="../assets/images/features-1.svg" alt="" />
      </div>
      <div class="form" action="" >
        <div v-if="showDiv == 1">
          <h2>Login to your account As :</h2>
          <input type="submit" value="Admin" @click="loginAdmin"/>
          <input type="submit" value="Client" @click="loginClient"/>
  
        </div>
        <div class="Ref-admin" v-if="showDiv === 'Admin'">
          <label for="referance-id">Referance</label>
          <input
            type="text"
            id="referance-id"
            placeholder="Enter admin ref..."
            required
            v-model="reff.AdminReff"
          />
          <input type="submit" @click="GoToDash" value="Submit" />
        </div>
        <div class="Ref-client" v-if="showDiv === 'Client'">
          <label for="">Referance</label>
          <input
            type="text"
            id="referance-id"
            placeholder="Enter client ref..."
            required
            v-model="reff.ClientReff"
          />
          <input type="submit" @click="GoToClientPage" value="Submit" />
        </div>
      </div>
    </div>
  </main>
  <Footerlogin />
</template>




<script>
import router from "@/router";
import NavBar from '../components/NavBar.vue';
// import Footer from '../components/Footer.vue';
import Footerlogin from "@/components/Footerlogin.vue";
import Cookies from 'vue-cookies';

export default {
  name: "RegistreView",
  data(){
    return{
      showDiv : 1,
      checkRef : null,
      reff : { AdminReff : '' , ClientReff : ''}
    }
  },
  components: {
    NavBar,
    Footerlogin
  },
  methods: {


    async GoToDash() {
    if (this.AdminReff != '' ) {
      let respon = await axios.post('http://localhost/architecte/backend/api/clients/loginAdmin.php', {
        reff: this.reff.AdminReff
      });

      console.log(respon);
      this.checkRef = respon.data.response;

        if (this.checkRef) {

          this.$router.push('/Dashboard');

        } else {
        alert("Admin does not exist");
        }

    } else {
      alert('Please enter reff');
    }
    },
    
    
    async GoToClientPage() {
    if (this.reff.ClientReff != '' ) {
      let respon = await axios.post('http://localhost/architecte/backend/api/clients/loginClient.php', {
        reff: this.reff.ClientReff
        
      });
      console.log(respon);
      this.checkRef = respon.data.response;

        if (this.checkRef) {
          Cookies.set('refference',this.reff.ClientReff);
          console.log(Cookies.get('refference'));

          this.$router.push('/ClientPage')

        } else {
        alert("User does not exist");
        }

    } else {
      alert('Please enter reff');
    }
    },



    loginAdmin(){
        this.showDiv = 'Admin';
    },
    loginClient(){
        this.showDiv = 'Client';
    }
  }
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
  height: 100%;
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

.container .form {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  padding: 0 3% 0 3%;
  justify-content: center;
  align-content: center;
  background-color: #f7f9f9;
  border-radius: 0 15px 15px 0;
    h2{
      text-align: center;
      margin-bottom: 4%;
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

.container .form input[type="text"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.container .form input[type="number"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.container .form input[type="date"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.container .form input[type="submit"] {
  width: 100%;
  background-color: #68d391;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.container .form input[type="submit"]:hover {
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
// #form-rdv{
//   height: auto;
}
</style>



