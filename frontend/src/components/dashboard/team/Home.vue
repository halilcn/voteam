<template>
  <div class="home">
    <div class="votes">
      <div class="title">
        <i class="bi bi-archive"></i>
        Oylamalar
      </div>
      <div class="content list-container">
        <div class="active-votes">
          <div class="title">
            Aktif Oylamalar
          </div>
          <div class="list">
            <div class="item">
              <div class="icon">
                <i class="bi bi-arrow-up-square-fill"></i>
              </div>
              <div class="vote-type">
                Güç Oylaması
              </div>
            </div>
          </div>
        </div>
        <div class="next-votes">
          <div class="title">
            Gelecek Oylamalar
          </div>
          <div class="list">
            <div class="item">
              <div class="icon">
                <i class="bi bi-arrow-up-square-fill"></i>
              </div>
              <div class="vote-type">
                Güç Oylaması
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="team">
      <div class="title">
        <i class="bi bi-people"></i>
        Takım
      </div>
      <div class="content team-info">
        team info
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'TeamHOme'
};
</script>

<style lang="scss" scoped>
.home {
  display: flex;
  justify-content: space-between;
  height: 100%;

  > div {
    width: 48%;

    > .title {
      font-weight: 500;
      font-size: 17px;
      color: $df-dark-blue-color;
    }
  }

  .content {
    @include center-lg-box-shadow;
    padding: 10px;
    border-radius: 5px;
    margin-top: 6px;
    height: 100%;
  }

  .votes {

    .list-container {
      width: 100%;

      > div {

        > .title {
          font-weight: 400;
          font-size: 14px;
          color: #484848;
        }

        .list {
          display: flex;

          .item {
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            background-color: #f8f8f8;

            .icon {
              font-size: 30px;
            }

            .vote-type {
              font-size: 15px;
            }
          }
        }
      }

      .active-votes {
        .list {

          .item {

          }
        }
      }

      .next-votes {

      }
    }
  }

  .team {

    .team-info {
    }
  }

}
</style>
