<template>
  <transition name="bg-fade">
    <div v-if="isEnable" @click="$emit('handleDisable')" class="bg-filter"/>
  </transition>
  <transition name="popup-scale">
    <div v-if="isEnable" class="popup">
      <div class="top">
        <div class="title">
          {{title}}
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
  data() {
    return {
      delayIsEnable: this.isEnable
    };
  },
  props: {
    isEnable: {
      required: true,
      type: Boolean
    },
    title: {
      required: true,
      type: String
    }
  }
};
</script>

<style lang="scss" scoped>
.bg-filter {
  width: 100%;
  height: 100%;
  position: fixed;
  z-index: 99;
  background-color: #2d2d2d;
  opacity: .5;
}

.popup {
  @include center-md-box-shadow;
  width: 500px;
  height: 100px;
  background-color: white;
  border-radius: 5px;
  padding: 6px;
  position: fixed;
  z-index: 9999;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
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
      color: #9f9f9f; //$df-mdl-dark-black-color;

      &:hover {
        color: $df-blue-color;
      }
    }
  }

  .content {
    padding: 5px 0;
    font-size: 14px;
  }
}


.popup-scale-enter-active {
  animation: popup-scale-active .3s;
}

.popup-scale-leave-to {
  animation: popup-scale-leave .3s;
}


.bg-fade-enter-active {
  animation: bg-fade-active 0.2s;
}

.bg-fade-leave-to {
  animation: bg-fade-leave 0.2s;
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
</style>
