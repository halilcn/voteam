<template>
  <div class="content">
    <div class="item main reverse-order">
      <div class="text">
        <div class="title">
          <span class="voteam">voteam</span>
          {{ $t('home.content.itemOne.title') }}
        </div>
        <div class="info">
          <span class="voteam">voteam</span>
          {{ $t('home.content.itemOne.info') }}
        </div>
        <router-link
            tag="div"
            :to="{name:'Register'}"
            class="create-team-btn">
          <i class="bi bi-patch-plus-fill"></i>
          {{ $t('home.content.itemOne.createTeamBtn') }}
        </router-link>
      </div>
      <div class="animation">
        <lottie-player
            autoplay
            loop
            background="transparent"
            mode="normal"
            speed="0.9"
            src="https://assets3.lottiefiles.com/packages/lf20_5e7wgehs.json"/>
      </div>
    </div>
    <div class="item">
      <div class="animation">
        <lottie-player
            autoplay
            loop
            background="transparent"
            mode="normal"
            speed="0.9"
            src="https://assets9.lottiefiles.com/packages/lf20_MtN0BG.json"/>
      </div>
      <div class="text">
        <div class="title">
          {{ $t('home.content.itemTwo.title') }}
        </div>
        <div class="info">
          {{ $t('home.content.itemTwo.info') }}
        </div>
      </div>
    </div>
    <div class="item reverse-order">
      <div class="text">
        <div class="title">
          {{ $t('home.content.itemThree.title') }}
        </div>
        <div class="info">
          {{ $t('home.content.itemThree.info') }}
        </div>
      </div>
      <div class="animation">
        <lottie-player
            autoplay
            loop
            background="transparent"
            mode="normal"
            speed="0.9"
            src="https://assets8.lottiefiles.com/packages/lf20_UQy5L5.json"/>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Content'
};
</script>

<style lang="scss" scoped>
.content {
  padding: 0 $df-dsktp-lr-width-pdn;

  .item {
    margin: 40px 0;
    display: flex;
    align-items: center;

    .text {
      width: 55%;
      padding: 0 15px;

      .title {
        font-weight: 600;
        font-size: 35px;
        color: $df-dark-blue-color;

        .voteam {
          color: $df-blue-color;
          border-bottom: 5px solid $df-blue-color;
          border-radius: 4px;
        }
      }

      .info {
        font-weight: 300;
        font-size: 17px;
        margin-top: 23px;
        color: $df-black-and-blue-color;
        word-spacing: 3px;
        line-height: 30px;

        .voteam {
          font-weight: 600;
        }
      }
    }

    .animation {
      width: 45%;
      height: 400px;
    }
  }

  .main {
    .text {
      .title {
        font-size: 45px;
      }
    }

    .create-team-btn {
      font-weight: 600;
      display: inline-block;
      padding: 10px 35px;
      margin-top: 35px;
      background-color: $df-blue-color;
      color: white;
      border-radius: 20px;
      cursor: pointer;
      transition: .3s;

      &:hover {
        @include center-md-blue-box-shadow;
        transform: scale(1.03);
      }

      i {
        margin-right: 7px;
      }
    }
  }
}

@media only screen and (max-width: $df-mobile-width) {
  .content {
    padding: $df-mbl-lr-width-pdn;

    .item {
      margin: 20px 0;
      flex-direction: column;

      &.reverse-order {
        flex-direction: column-reverse;
      }

      .text {
        width: 100%;
        text-align: center;
        margin: 5px 0;

        .title {
          font-size: 23px;
        }

        .info {
          font-size: 13px;
        }
      }

      .animation {
        height: 200px;
        width: 100%;
      }
    }
  }
}
</style>
