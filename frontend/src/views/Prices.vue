<template>
  <top-header></top-header> <!--  code review-->
  <div class="prices">
    <div class="free-title">
      Ömür boyu <span>ücretsiz</span> !
    </div>
    <div class="features-list">
      <div class="item">
        <div class="icon">
          <i class="fab fa-facebook-square"></i>
          <i class="fa fa-facebook-square"></i>
        </div>
        <div class="txt">öözelli dsasdla okdaodadjkas dadlaldajsd as</div>
      </div>
      <div class="item">
        <div class="icon">--</div>
        <div class="txt">öözelli dsasdla okdaodadjkas dadlaldajsd as</div>
      </div>
    </div>
  </div>
</template>

<script>
import TopHeader from '../components/home/TopHeader';

export default {
  name: 'Prices',
  components: {
    TopHeader: TopHeader
  }
};
</script>

<style lang="scss" scoped>
.prices {
  display: flex;
  flex-direction: column;
  align-items: center;

  .free-title {

  }

  .features-list {
    background-color: white;
    width: 50%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #dae6ff;
    font-size: 14px;

    box-shadow: 0 0px 0.4px rgba(0, 0, 0, 0.022),
    0 0px 1px rgba(0, 0, 0, 0.032),
    0 0px 1.9px rgba(0, 0, 0, 0.04),
    0 0px 3.4px rgba(0, 0, 0, 0.048),
    0 0px 6.3px rgba(0, 0, 0, 0.058),
    0 0px 15px rgba(0, 0, 0, 0.08);

    .item {
      display: flex;
    }
  }

}
</style>
