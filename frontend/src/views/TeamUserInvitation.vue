<template>
  <canvas id="confetti"></canvas>
  <div class="joined">
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
    <div class="teams-btn">
      Takımlara Git
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex';
import confetti from 'canvas-confetti';

export default {
  name: 'TeamUserInvitation',
  methods: {
    test() {
      // alert(!!this.user);
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
    this.test();
    this.startConfetti();
  }
};
</script>

<style lang="scss" scoped>
.joined {
  display: flex;
  flex-direction: column;
  align-items: center;

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
    margin-top: 80px;
    background-color: $df-light-black;
    color: $df-black-and-blue-color;
    border-radius: 5px;
  }
}
</style>
