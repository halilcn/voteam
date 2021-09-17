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
        <div class="txt">
          Demokratik takım yönetimi
        </div>
      </div>
      <div class="item">
        <div class="icon">
          <i class="bi bi-patch-check-fill"></i>
        </div>
        <div class="txt">
          Sınırsız takım oluşturabilme/katılabilme
        </div>
      </div>
      <div class="item">
        <div class="icon">
          <i class="bi bi-patch-check-fill"></i>
        </div>
        <div class="txt">
          Belli zamanlarda hatırlatıcı e-mail gönderebilme
        </div>
      </div>
    </div>
  </div>
  <bottom-footer/>
</template>

<script>
import TopHeader from '../components/home/TopHeader';
import Footer from '../components/shared/Footer';

export default {
  name: 'Prices',
  components: {
    TopHeader,
    BottomFooter: Footer
  }
};
</script>

<style lang="scss" scoped>

.prices {
  display: flex;
  flex-direction: column;
  align-items: center;
  height: 100%;

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
    width: 400px;
    padding: 15px;
    border-radius: 5px;
    font-size: 15px;

    .item {
      color: $df-dark-blue-color;
      font-weight: 300;
      display: flex;
      margin: 5px 0;

      .icon {
        color: $df-green-color;
      }

      .txt {
        margin-left: 6px;
      }
    }
  }
}

@media only screen and (max-width: 900px) {
  .prices {
    padding: $df-mbl-lr-width-pdn;

    .free-title {
      margin-top: 50px;
      font-size: 21px;
    }

    .features-list {
      width: 100%;
      padding: 10px;
      font-size: 14px;
    }
  }
}
</style>
