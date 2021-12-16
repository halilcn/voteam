<template>
  <popup
      title="İlk Bakış"
      @handleDisable="togglePopup"
      :is-enable="isEnable">
    <template v-slot:content>
      <canvas class="confetti" id="confetti"></canvas>
      <div class="celebration">
        <img src="../../assets/icons/celebration.png" alt="celebration-img"/>
        <div class="text">
          <span>
            voteam'e
          </span>
          hoşgeldin !
        </div>
      </div>
      <div class="first-step-1">
        İster kendi takım ismini girerek takım oluştur
        , ister takım koduyla takıma katıl.
      </div>
      <div class="invitation-info">
        Eğer daha önce takım daveti atıldıysa e-mail adresini kontrol etmeyi unutma.
      </div>
    </template>
  </popup>
</template>

<script>
import Popup from '../shared/Popup';
import confetti from 'canvas-confetti';
import { mapState, mapMutations } from 'vuex';

export default {
  name: 'WelcomeUserPopup',
  data() {
    return {
      isEnable: false
    };
  },
  components: {
    Popup
  },
  methods: {
    ...mapMutations('auth', ['removeNewUserStatus']),
    togglePopup() {
      this.isEnable = !this.isEnable;
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
    ...mapState('auth', ['newUserStatus'])
  },
  created() {
    if (this.newUserStatus) {
      this.togglePopup();
      this.startConfetti();
      this.removeNewUserStatus();
    }
  }
};
</script>

<style lang="scss" scoped>

.confetti {
  position: absolute;
  top: 40px;
  width: 100%;
  height: 100%;
  left: 0;
}

.celebration {
  display: flex;
  align-items: center;
  justify-content: center;

  img {
    width: 25px;
    height: 25px;
    margin-right: 12px;
  }

  .text {
    color: $df-dark-blue-color;
    font-size: 21px;
    font-weight: 500;

    span {
      color: $df-blue-color;
    }
  }
}

.first-step-1 {
  text-align: center;
  margin: 25px 0;
  color: $df-dark-blue-color;
  font-size: 15px;
}

.invitation-info {
  text-align: center;
  font-weight: 300;
  font-style: italic;
  color: $df-black-and-blue-color;
  background-color: #eceff3;
  padding: 7px;
  border-radius: 5px;
  font-size: 13px;
}
</style>
