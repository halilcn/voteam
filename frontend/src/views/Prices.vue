<template>
  <div class="prices-container">
    <top-header/>
    <div class="prices">
      <div class="free-title">
        {{ $t('pricing.title.first') }} <span>{{ $t('pricing.title.second') }}</span> !
      </div>
      <div class="free-icon">
        <img src="../assets/icons/free.png" alt="free-icon"/>
      </div>
    </div>
    <bottom-footer/>
  </div>
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

.prices-container {
  height: 100%;

  .prices {
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;

    .free-title {
      font-weight: 500;
      font-size: 28px;
      margin: 35px 0;
      color: $df-dark-blue-color;

      span {
        color: $df-green-color;
        border-bottom: 2px solid $df-green-color;
      }
    }

    .free-icon {

      img {
        width: 180px;
      }

    }
  }
}

@media only screen and (max-width: $df-mobile-width) {
  .prices {
    padding: $df-mbl-lr-width-pdn;

    .free-title {
      margin-top: 50px;
      font-size: 21px;
    }

    .free-icon {

      img {
        width: 150px;
      }

    }
  }
}
</style>
