<template>
  <NavBar />
  <main>
    <div class="container">
      <div class="image_section">
        <img src="../assets/images/description-2.svg" alt="" />
      </div>
      <form id="form" @submit.prevent="addclient">
        <div v-if="showDiv == 1">
          <label for="nom">Nom</label>
          <input
            type="text"
            placeholder="Entrer votre nom"
            id="nom"
            required
            v-model="client.lastname"
          />
          <label for="prenom">Prenom</label>
          <input
            type="text"
            placeholder="Entrer votre prenom"
            id="prenom"
            required
            v-model="client.firstname"
          />
          <label for="age">Age</label>
          <input
            type="number"
            placeholder="Entrer votre age"
            id="age"
            required
            v-model="client.age"
          />
          <label for="profession">Profession</label>
          <input
            type="text"
            placeholder="Entrer votre profession"
            id="profession"
            required
            v-model="client.proff"
          />
          <input type="submit" value="Submit" />
        </div>
        <div v-if="showDiv == 2">
          <div class="success">
            <!-- <i class="fa-regular fa-circle-check"></i>
            <h3>Successfully Registered</h3> -->
            <div class="copyRef">
              <p>
                Your Referance is :
                <b style="color: black"
                  ><input type="button" id="myInput" v-model="Reference"
                /></b>
              </p>
              <i class="fa-solid fa-copy" @click="copy"></i>
            </div>
          </div>
          <div class="reservation">
            <label for="">Book your appointment now</label>
            <router-link to="/Rendez-vous"
              ><input type="submit" value="Rendez-vous"
            /></router-link>
          </div>
        </div>
        <div v-if="showDiv == 4">
          <div class="success">
            <i class="fa-light fa-exclamation" style="color: red"></i>
            <h3 style="color: red">This account has already been registered</h3>
            <input
              type="button"
              style="
                margin-top: 10%;
                border: none;
                width: 30%;
                border-radius: 5px;
                background-color: black;
                color: white;
                padding: 5px 10px;
              "
              @click="tryAgain"
              value="Try again"
            />
          </div>
        </div>
      </form>
    </div>
  </main>
  <Footer />
</template>




<script>
import NavBar from "../components/NavBar.vue";
import Footer from "../components/Footer.vue";
import swal from "sweetalert";


export default {
  name: "RegistreView",
  data() {
    return {
      showDiv: 1,
      RegCondition: null,
      Reference: null,
      client: {
        id: "",
        firstname: "",
        lastname: "",
        proff: "",
        age: "",
        reff: "",
        CRN: "",
        RDV: "",
        clientId: "",
      }
    };
  },
  components: {
    NavBar,
    Footer,
  },
  methods: {
    async addclient() {
      this.Reference =
        this.client.firstname[0] +
        this.client.lastname[0] +
        this.client.proff[0] +
        2022+
        this.client.age ;

      const axi = await axios.post("http://localhost/architecte/backend/api/clients/create.php", {
        firstname: this.client.firstname,
        lastname: this.client.lastname,
        age: this.client.age,
        proff: this.client.proff,
        reff: this.Reference,
      });
      this.RegCondition = axi.data.response;
      if (this.RegCondition) {
        swal({
          title: "Successfully Registered",
          icon: "success",
          button: "ok",
        });

        this.showDiv = 2;
      } else {
        // this.showDiv = 4;
        swal({
          title: "This account has already been registered",
          icon: "error",
          button: "try again",
        });
      }
    },

    tryAgain() {
      this.showDiv = 1;
    },
    copy() {
      var copyText = document.getElementById("myInput").value;
      navigator.clipboard
        .writeText(copyText)
        .then(() => {
          console.log("Text copied to clipboard");
        })
        .catch((err) => {
          console.error("Error in copying text: ", err);
        });
    },
  },
};
</script> 


<style lang="scss">
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

  .success {
    display: flex;
    flex-direction: column;
    align-items: center;
    .copyRef {
      width: 60%;
      display: flex;
      justify-content: space-evenly;
      align-items: baseline;
      input {
        background-color: transparent;
        border: none;
      }
      i {
        padding-top: 7px;
        font-size: 20px;
        color: #68d391;
      }
    }
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

.container form input[type="number"] {
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
// #form-rdv{
//   height: auto;
}

</style>