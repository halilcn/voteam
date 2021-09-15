<template>
  <div class="content">
    <div class="item main reverse-order">
      <div class="text">
        <div class="title">
          votem takım yönetimini grupça yapmayı sağlar
        </div>
        <div class="info">
          loreldksa ajd ajsdsadjask jaskdhasjkdhas oıertuer tıertuıertu ejdfghjdfdsadjask jaskdhasjkdhas oıertuer
          tıertuıertu ejdfghjdfdsadjask jaskdhasjkdhas oıertuer tıertuıertu ejdfghjdfdsadjask jaskdhasjkdhas oıertuer
          tıertuıertu ejdfghjdf
        </div>
        <div class="create-team-btn">
          <i class="bi bi-patch-plus-fill"></i>
          Takım Oluştur
        </div>
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
          Oylar gizli kalsın
        </div>
        <div class="info">
          loreldksa ajd ajsdsadjask jaskdhasjkdhas oıertuer tıertuıertu ejdfghjdf
        </div>
      </div>
    </div>
    <div class="item reverse-order">
      <div class="text">
        <div class="title">
          Takım bütünlüğü sağlansın
        </div>
        <div class="info">
          loreldksa ajd ajsdsadjask jaskdhasjkdhas oıertuer tıertuıertu ejdfghjdf
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
    margin: 7px 0;
    display: flex;
    align-items: center;
    color: $df-dark-blue-color;

    .text {
      width: 55%;

      .title {
        font-weight: 600;
        font-size: 35px;
      }

      .info {
        font-weight: 300;
        font-size: 15px;
      }
    }

    .animation {
      width: 45%;
      height: 400px;
    }
  }

  .main {
    .create-team-btn {
      font-weight: 500;
      display: inline-block;
      padding: 6px 20px;
      margin-top: 20px;
      background-color: $df-blue-color;
      color: white;
      border-radius: 20px;
      cursor: pointer;
      transition: .3s;

      &:hover {
        @include center-md-blue-box-shadow;
      }
    }
  }
}

@media only screen and (max-width: $df-mobile-width) {
  .content {
    padding: $df-mbl-lr-width-pdn;

    .item {
      flex-direction: column;

      .text {
        div {
          text-align: center;
        }

        .title {
          font-size: 30px;
        }

        .info {
          font-size: 13px;
        }
      }

      .animation {
        width: 100%;
      }
    }

    .item.reverse-order {
      flex-direction: column-reverse;
    }
  }
}
</style>
