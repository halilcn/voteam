<template>
  <div v-if="auth" class="auth container">
    <div v-if="joinedTeam" class="joined item">
      <canvas id="confetti"></canvas>
      <div class="text">
        <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_wkebwzpz.json"
                       background="transparent"
                       speed="1"
                       style="width: 140px;
                      height: 140px;"
                       loop
                       autoplay/>
        Takıma Katıldın
      </div>
      <router-link
          class="teams-btn"
          :to="{name:'TeamsList'}">
        Takımlara Git
      </router-link>
    </div>
  </div>
  <div v-else class="guest container">
    <div class="guest-info item">
      <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_0iHUgw.json"
                     background="transparent"
                     speed="1"
                     style="width: 150px; height: 150px;"
                     loop
                     autoplay/>
      <div class="info">
        Takıma katılmak için
        <router-link
            class="user-action"
            :to="{name:'Login'}">
          Giriş
        </router-link>
        yapman ya da
        <router-link
            class="user-action"
            :to="{name:'Register'}">
          Kayıt
        </router-link>
        olman gerekir.
      </div>
      <div class="side-information">
        Giriş yaptıktan sonra bu sayfayı tekrar kontrol ediniz.
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex';
import confetti from 'canvas-confetti';

export default {
  name: 'TeamUserInvitation',
  data() {
    return {
      joinedTeam: false,
      auth: false
    };
  },
  methods: {
    ...mapActions('team', ['postJoinTeamWithInvitation']),
    checkUser() {
      this.auth = !!this.user;
    },
    postJoinTeamWithInvitationAction() {
      this.handle(async () => {
        await this.postJoinTeamWithInvitation(this.$route.params.invitationKey);
        this.joinedTeam = true;
        this.startConfetti();
      }, (err) => {
        if (err.response.status === 400) {
          this.$router.push({ name: 'NoPage' });
          return true;
        }
      });
    },
    startConfetti() {
      const myCanvas = document.getElementById('#confetti');
      const myConfetti = confetti.create(myCanvas, {
        resize: true,
        useWorker: true
      });
      myConfetti({
        particleCount: 100,
        spread: 70,
        origin: { y: 0.6 }
      });
    }
  },
  computed: {
    ...mapState('auth', ['user'])
  },
  created() {
    this.checkUser();

    if (this.auth) {
      this.postJoinTeamWithInvitationAction();
    }
  }
};
</script>

<style lang="scss" scoped>
.item {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100%;
}

.container {
  height: 100%;
}

.auth {
  .joined {
    position: relative;

    .text {
      display: flex;
      flex-direction: column;
      align-items: center;
      font-weight: 400;
      font-size: 25px;
      color: #50D05C;
    }

    .teams-btn {
      padding: 8px 32px;
      background-color: $df-light-black;
      color: $df-black-and-blue-color;
      border-radius: 5px;
      margin-top: 50px;

      &:hover{
        background-color: #d3d6da;
      }
    }

    #confetti {
      position: absolute;
      top: 0;
    }
  }
}

.guest {
  .guest-info {
    .info {
      font-weight: 300;
      font-size: 18px;
      color: $df-dark-blue-color;
      margin-top: 30px;

      .user-action {
        font-weight: 400;
        color: $df-blue-color;

        &:hover {
          text-decoration: underline;
        }
      }
    }

    .side-information {
      font-weight: 300;
      font-size: 13px;
      font-style: italic;
      color: $df-black-and-blue-color;
      margin-top: 20px;
    }
  }
}
</style>
