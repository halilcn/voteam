<template>
  <div class="wrapper">
    <div
        v-for="(text,index) in textCount"
        :key="index"
        :class="{text:textCount > 1}">
      <div
          v-for="(textLine,index) in textLineCount"
          :key="index"
          :style="{height:`${textLineHeight}px`}"
          :class="{'multiple-text-line':textLineCount > 1}"
          class="text-line"/>
    </div>
  </div>
</template>

<script>
export default {
  name: 'LoadingAnimation',
  props: {
    textLineCount: {
      required: false,
      type: Number,
      default: 4
    },
    textCount: {
      required: false,
      type: Number,
      default: 1
    },
    textLineHeight: {
      required: false,
      type: Number,
      default: 20
    }
  }
};
</script>

<style scoped>
.wrapper {
  width: 100%;
}

@-webkit-keyframes placeHolderShimmer {
  0% {
    background-position: -468px 0;
  }
  100% {
    background-position: 468px 0;
  }
}

@keyframes placeHolderShimmer {
  0% {
    background-position: -468px 0;
  }
  100% {
    background-position: 468px 0;
  }
}

.text-line {
  -webkit-animation-duration: 1.25s;
  animation-duration: 1.25s;
  -webkit-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-name: placeHolderShimmer;
  animation-name: placeHolderShimmer;
  -webkit-animation-timing-function: linear;
  animation-timing-function: linear;
  background: #F6F6F6;
  background: linear-gradient(to right, #F6F6F6 8%, #F0F0F0 18%, #F6F6F6 33%);
  background-size: 800px 104px;
  position: relative;
}

.text {
  margin-bottom: 50px;
}

.text-line {
  width: 100%;
  border-radius: 4px;
}

.multiple-text-line {
  margin: 15px 0;
}
</style>
