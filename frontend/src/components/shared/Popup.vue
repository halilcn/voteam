<template>
  <transition name="bg-fade">
    <div
        v-if="isEnable"
        @click="$emit('handleDisable')"
        class="bg-filter"/>
  </transition>
  <transition name="popup-scale">
    <div
        v-if="isEnable"
        :style="{width:`${width}px`}"
        class="popup">
      <div class="top">
        <div class="title">
          {{ title }}
        </div>
        <div @click="$emit('handleDisable')" class="disable-btn">
          <i class="bi bi-x-lg"></i>
        </div>
      </div>
      <div class="content">
        <slot name="content"/>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  name: 'Popup',
  props: {
    isEnable: {
      required: true,
      type: Boolean
    },
    title: {
      required: true,
      type: String
    },
    width: {
      required: false,
      type: Number,
      default: 500
    }
  }
};
</script>

<style lang="scss" scoped>
$animation-time: .3s;

.bg-filter {
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  position: fixed;
  z-index: 99;
  background-color: #2d2d2d;
  opacity: .5;
}

.popup {
  @include center-md-box-shadow;
  max-height: 80%;
  background-color: white;
  border-radius: 5px;
  padding: 8px;
  position: fixed;
  z-index: 999;
  left: 0;
  right: 0;
  top: 70px;
  margin: auto;

  .top {
    position: relative;

    .title {
      color: #595959;
      border-bottom: 1px solid #e5e5e5;
      font-weight: 500;
      font-size: 17px;
      text-align: center;
      padding: 5px;
    }

    .disable-btn {
      position: absolute;
      right: 5px;
      top: 5px;
      cursor: pointer;
      transition: .3s;
      color: #9f9f9f;

      &:hover {
        color: $df-blue-color;
      }
    }
  }

  .content {
    padding: 10px 0;
    font-size: 14px;
  }
}


.popup-scale-enter-active {
  animation: popup-scale-active $animation-time;
}

.popup-scale-leave-to {
  animation: popup-scale-leave $animation-time;
}

@keyframes popup-scale-active {
  0% {
    opacity: 0;
    transform: scale(0.8);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}

@keyframes popup-scale-leave {
  0% {
    opacity: 1;
    transform: scale(1);
  }
  100% {
    opacity: 0;
    transform: scale(0.8);
  }
}


.bg-fade-enter-active {
  animation: bg-fade-active $animation-time;
}

.bg-fade-leave-to {
  animation: bg-fade-leave $animation-time;
}

@keyframes bg-fade-active {
  0% {
    opacity: 0;
  }
  100% {
    opacity: .5;
  }
}

@keyframes bg-fade-leave {
  0% {
    opacity: .5;
  }
  100% {
    opacity: 0;
  }
}


@media only screen and (max-width: $df-mobile-width) {
  .popup {
    width: 90% !important;

    .top {
      .title {
        font-size: 16px;
      }
    }
  }
}
</style>
