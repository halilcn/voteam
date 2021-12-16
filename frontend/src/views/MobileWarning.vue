<template>
  <div class="mobile-warning">
    <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_pojzngga.json"
                   background="transparent"
                   speed="1"
                   style="
                   width: 150px;
                   height: 150px;"
                   loop autoplay/>
    <div class="info">
      Şimdilik mobilde hizmet veremiyoruz.
    </div>
  </div>
</template>

<script>
export default {
  name: 'MobileWarning'
};
</script>

<style lang="scss" scoped>
.mobile-warning {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100%;
  padding: 10px;

  .info {
    margin-top: 20px;
    font-size: 17px;
    font-weight: 500;
    color: $df-blue-color;
  }
}
</style>
