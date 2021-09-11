<template>
  <div class="content">
    <div class="item main">
      <div class="text">
        <div class="title">
          Title Tİtle Doksdfsf Sosdfjısdfds
        </div>
        <div class="info">
          loreldksa ajd ajsdsadjask jaskdhasjkdhas oıertuer tıertuıertu ejdfghjdf
        </div>
        <div class="create-team-btn">
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
          gizli oylar
        </div>
        <div class="info">
          loreldksa ajd ajsdsadjask jaskdhasjkdhas oıertuer tıertuıertu ejdfghjdf
        </div>
      </div>
    </div>
    <div class="item">
      <div class="text">
        <div class="title">
          takım bütlüğü sağlansın
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
import '@lottiefiles/lottie-player'

export default {
  name: 'Content'
}
</script>

<style lang="scss" scoped>
.content {

  .item {
    margin: 0 5px;
    display: flex;
    align-items: center;
    justify-content: center;

    .text {
      .title {
        font-weight: 600;
        font-size: 33px;
        color: #02273D;
      }
    }

    .animation {
      width: 650px;
    }
  }

  .main {

    .create-team-btn {
      font-weight: 500;
    }
  }
}
</style>
