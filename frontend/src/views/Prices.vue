<template>
  <top-header/>
  <div class="prices">
    <div class="free-title">
      Ömür boyu tamamen <span>ücretsiz</span> !
    </div>
    <div class="features-list">
      <div class="item">
        <div class="icon">
          <i class="bi bi-patch-check-fill"></i>
        </div>
        <div class="txt">Sınırsız takım oluşturabilme.</div>
      </div>
      <div class="item">
        <div class="icon">
          <i class="bi bi-patch-check-fill"></i>
        </div>
        <div class="txt">Takımlara sınırsız üye ekleyebilme.</div>
      </div>
      <div class="item">
        <div class="icon">
          <i class="bi bi-patch-check-fill"></i>
        </div>
        <div class="txt">öözelli dsasdla okdaodadjkas dadlaldajsd as</div>
      </div>
      <div class="item">
        <div class="icon">
          <i class="bi bi-patch-check-fill"></i>
        </div>
        <div class="txt">öözelli dsasdla okdaodadjkas asasdsa as</div>
      </div>
    </div>
  </div>
</template>

<script>
import TopHeader from '../components/home/TopHeader';

export default {
  name: 'Prices',
  components: {
    TopHeader
  }
};
</script>

<style lang="scss" scoped>

.prices {
  display: flex;
  flex-direction: column;
  align-items: center;

  .free-title {
    font-weight: 500;
    font-size: 25px;
    margin: 35px 0;
    color: $df-dark-blue-color;

    span {
      color: $df-green-color;
      border-bottom: 2px solid $df-green-color;
    }
  }

  .features-list {
    @include center-md-box-shadow;
    width: 45%;
    padding: 10px;
    border-radius: 5px;
    font-size: 14px;

    .item {
      color: $df-dark-blue-color;
      font-weight: 300;
      display: flex;
      margin: 3px 0;

      .icon {
        color: $df-green-color;
      }

      .txt {
        margin-left: 6px;
      }
    }
  }
}
</style>
