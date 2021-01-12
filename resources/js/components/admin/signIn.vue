<template>
  <div id="container" class="container-singin">
    <!-- FORM SECTION -->
    <div class="row">
      <!-- SIGN UP -->
      <div class="col align-items-center flex-col sign-up">
        <div class="form-wrapper align-items-center">
          <div class="form sign-up">
            <div class="input-group">
              <i class="bx bxs-user"></i>
              <input type="text" placeholder="Username" v-model="form.username" />
            </div>
            <div class="input-group">
              <i class="bx bx-mail-send"></i>
              <input type="email" placeholder="Email" v-model="form.email"/>
            </div>
            <div class="input-group">
              <i class="bx bxs-lock-alt"></i>
              <input type="password" placeholder="Password" v-model="form.password"/>
            </div>
            <div class="input-group">
              <i class="bx bxs-lock-alt"></i>
              <input type="password" placeholder="Confirm password" />
            </div>
            <button @click="register()">Sign up</button>
            <p>
              <span> Already have an account? </span>
              <b onclick="toggle()" class="pointer pointer-customs">
                Sign in here
              </b>
            </p>
          </div>
        </div>
        <div class="form-wrapper">
          <div class="social-list align-items-center sign-up">
            <div class="align-items-center facebook-bg">
              <i class="bx bxl-facebook"></i>
            </div>
            <div class="align-items-center google-bg">
              <i class="bx bxl-google"></i>
            </div>
            <div class="align-items-center twitter-bg">
              <i class="bx bxl-twitter"></i>
            </div>
            <div class="align-items-center insta-bg">
              <i class="bx bxl-instagram-alt"></i>
            </div>
          </div>
        </div>
      </div>
      <!-- END SIGN UP -->
      <!-- SIGN IN -->
      <div class="col align-items-center flex-col sign-in">
        <div class="form-wrapper align-items-center">
          <div class="form sign-in">
            <div class="input-group">
              <i class="bx bxs-user"></i>
              <input
                type="text"
                placeholder="Username"
                v-model="form.email"
                required
              />
            </div>
            <div class="input-group">
              <i class="bx bxs-lock-alt"></i>
              <input
                type="password"
                placeholder="Password"
                v-model="form.password"
                required
              />
            </div>
            <button @click="signIn()">Sign in</button>
            <p>
              <b> Forgot password? </b>
            </p>
            <p>
              <span> Don't have an account? </span>
              <b onclick="toggle()" class="pointer pointer-customs">
                Sign up here
              </b>
            </p>
          </div>
        </div>
        <div class="form-wrapper">
          <div class="social-list align-items-center sign-in">
            <div class="align-items-center facebook-bg">
              <i class="bx bxl-facebook"></i>
            </div>
            <div class="align-items-center google-bg">
              <i class="bx bxl-google"></i>
            </div>
            <div class="align-items-center twitter-bg">
              <i class="bx bxl-twitter"></i>
            </div>
            <div class="align-items-center insta-bg">
              <i class="bx bxl-instagram-alt"></i>
            </div>
          </div>
        </div>
      </div>
      <!-- END SIGN IN -->
    </div>
    <!-- END FORM SECTION -->
    <!-- CONTENT SECTION -->
    <div class="row content-row">
      <!-- SIGN IN CONTENT -->
      <div class="col align-items-center flex-col">
        <div class="text sign-in">
          <h2>Welcome back Diseno</h2>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit
            obcaecati, accusantium molestias, laborum, aspernatur deserunt
            officia voluptatum tempora dicta quo ab ullam. Assumenda enim harum
            minima possimus dignissimos deserunt rem.
          </p>
        </div>
        <div class="img sign-in">
          <img src="assets/undraw_different_love_a3rg.svg" alt="welcome" />
        </div>
      </div>
      <!-- END SIGN IN CONTENT -->
      <!-- SIGN UP CONTENT -->
      <div class="col align-items-center flex-col">
        <div class="img sign-up">
          <img src="assets/undraw_creative_team_r90h.svg" alt="welcome" />
        </div>
        <div class="text sign-up">
          <h2>Join with us</h2>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit
            obcaecati, accusantium molestias, laborum, aspernatur deserunt
            officia voluptatum tempora dicta quo ab ullam. Assumenda enim harum
            minima possimus dignissimos deserunt rem.
          </p>
        </div>
      </div>
      <!-- END SIGN UP CONTENT -->
    </div>
    <!-- END CONTENT SECTION -->
  </div>
</template>
<style scoped>
@import "../../../../public/css/signIn.css";
@import url("https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css");

.pointer-customs {
  color: #2d995b;
  font-size: 1.2rem;
}
</style>

<script>
export default {
  data() {
    return {
      form: {
        username: "",
        email: "",
        password: "",

      },
      // listTask:{},
      // id:0,
      // name:'',
      // content:'',
      // linkSound:'',
      // status:'',
      // form: new Form({
      //       id: '',
      //       name:'',
      // content:'',
      // linkSound:'',
      // status:'',
      //           }),
      // mySVG: require('/home-svg.svg');
    };
  },
  mounted() {},
  methods: {
    // loadTask(page = 1){
    //  // axios.get("/api/loadtasks?page=" + page).then(({ data }) => (this.listTask = data));
    // }
    register() {
      alert("hi");

      axios.post("auth/register",this.form)
        .then(() => {
        })
        .catch(() => {
        });
    },
    signIn() {
      axios.post("auth/login",this.form)
        .then(() => {
        })
        .catch(() => {
        });
    },
  },
  created() {
    var scripts = ["js/signIn.js"];
    scripts.forEach((script) => {
      let tag = document.createElement("script");
      tag.setAttribute("src", script);
      document.head.appendChild(tag);
    });
  },
};
</script>