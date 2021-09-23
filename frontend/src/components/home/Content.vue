<template>
  <div class="content">
    <div class="item main reverse-order">
      <div class="text">
        <div class="title">
          <span class="voteam">votem</span> takım yönetimini demokratikleştirir
        </div>
        <div class="info">
          <span class="voteam">voteam</span> herhangi bir takımı demokratik bir şekilde yönetmeye yarar. İş için, okul
          için ya da herhangi bir sebep
          için demokratik bir takım yönetimi arıyorsanız <span class="voteam">voteam</span> tam size göredir.
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
          Oylar gizli ve farklı güçtedir
        </div>
        <div class="info">
          Oluşturulan takımlarda bir oylama olduğunda, herkesin verdiği oy gizli ve farklı güçtedir.
          Takımda bulunan her kişinin gücünü, diğer takıma arkadaşları belirler. Bu sebepler bir takım kurulduğunda ilk
          yapılacak ilk iş diğer takım arkadaşlarını gücünü belirlemektir. Dağıtılan güçleri grup yöneticiside dahil hiç
          kimse göremez. Herkes verdiği oyun gücünü bilemez.
        </div>
      </div>
    </div>
    <div class="item reverse-order">
      <div class="text">
        <div class="title">
          Takım bütünlüğü sağlar
        </div>
        <div class="info">
          <span class="voteam">voteam</span> takımlar arasında güç tartışmalarını sona erdirir. Hiçkimse kimin ne kadar gücü olduğunu,
          kim kime ne kadar güç verdiğini bilmediği için takım bütünlüğü sağlanır.
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

        .voteam {
          color: $df-blue-color;
          border-bottom: 5px solid $df-blue-color;
          border-radius: 4px;
        }
      }

      .info {
        font-weight: 300;
        font-size: 15px;
        margin-top: 5px;

        .voteam {
          font-weight: 400;
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
      font-weight: 500;
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
