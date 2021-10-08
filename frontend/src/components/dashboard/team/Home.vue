<template>
  <div class="home">
    <div class="votes">
      <div class="title votes-title">
        <div class="txt">
          <i class="bi bi-archive"></i>
          Oylamalar
        </div>
        <div class="create-vote">
          <i class="bi bi-plus-circle-fill"></i>
          Oylama Başlat
        </div>
      </div>
      <div class="content list-container">
        <div class="active-votes">
          <div class="content-title">
            Aktif Oylamalar
          </div>
          <div class="list">
            <div class="item">
              <div class="top">
                <div class="icon">
                  <img src="../../../assets/icons/power-vote.png" alt="power-vote"/>
                </div>
                <div class="vote-type">
                  Güç Oylaması
                </div>
              </div>
              <div class="time">
                <i class="bi bi-clock-fill"></i>
                12 Haziran
              </div>
            </div>
            <div class="item">
              <div class="top">
                <div class="icon">
                  <img src="../../../assets/icons/power-vote.png" alt="power-vote"/>
                </div>
                <div class="vote-type">
                  Güç Oylaması
                </div>
              </div>
              <div class="time">
                12 Haziran
              </div>
            </div>
            <div class="item">
              <div class="top">
                <div class="icon">
                  <img src="../../../assets/icons/power-vote.png" alt="power-vote"/>
                </div>
                <div class="vote-type">
                  Güç Oylaması
                </div>
              </div>
              <div class="time">
                12 Haziran
              </div>
            </div>
            <div class="item">
              <div class="top">
                <div class="icon">
                  <img src="../../../assets/icons/power-vote.png" alt="power-vote"/>
                </div>
                <div class="vote-type">
                  Güç Oylaması
                </div>
              </div>
              <div class="time">
                12 Haziran
              </div>
            </div>
            <div class="item">
              <div class="top">
                <div class="icon">
                  <img src="../../../assets/icons/power-vote.png" alt="power-vote"/>
                </div>
                <div class="vote-type">
                  Güç Oylaması
                </div>
              </div>
              <div class="time">
                12 Haziran
              </div>
            </div>
            <div class="item">
              <div class="top">
                <div class="icon">
                  <img src="../../../assets/icons/power-vote.png" alt="power-vote"/>
                </div>
                <div class="vote-type">
                  Güç Oylaması
                </div>
              </div>
              <div class="time">
                12 Haziran
              </div>
            </div>
          </div>
        </div>
        <div class="next-votes">
          <div class="content-title">
            Gelecek Oylamalar
          </div>
          <div class="list">
            <div class="item">
              <div class="top">
                <div class="icon">
                  <img src="../../../assets/icons/power-vote.png" alt="power-vote"/>
                </div>
                <div class="vote-type">
                  Güç Oylaması
                </div>
              </div>
              <div class="time">
                12 Haziran
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
        <div class="item team-image">
          <img src="../../../assets/test/team.png" alt="team-image"/>
        </div>
        <div class="item">
          <div class="content-title">
            Adı
          </div>
          <div class="inner-content">
            Takım adı denemedı deneme
          </div>
        </div>
        <div class="item team-code">
          <div class="content-title">
            Kodu
          </div>
          <div class="inner-content">
            #43F4S
          </div>
        </div>
        <div class="item">
          <div class="content-title">
            Toplam Üye Sayısı
          </div>
          <div class="inner-content">
            23 kişi
          </div>
        </div>
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
    padding: 15px;
    border-radius: 5px;
    margin-top: 10px;
    height: 100%;

    .content-title {
      font-weight: 400;
      font-size: 14px;
      color: #484848;
    }
  }

  .votes {
    .votes-title {
      display: flex;
      align-items: center;

      .create-vote {
        font-weight: 500;
        cursor: pointer;
        padding: 5px 12px;
        font-size: 13px;
        background-color: $df-green-color;
        color: white;
        margin-left: auto;
        border-radius: 30px;
        transition: .3s;

        i {
          margin-right: 3px;
        }

        &:hover {
          background-color: $df-light-green-color;
        }
      }
    }

    .list-container {
      width: 100%;

      > div {
        .list {
          display: flex;
          flex-wrap: wrap;

          .item {
            margin: 7px 0;
            cursor: pointer;
            border-radius: 5px;
            overflow: hidden;
            transition: .2s;
            border: 1px solid #eeeeee;

            &:hover {
              background-color: #f8fbff;
            }

            .top {
              display: flex;
              flex-direction: column;
              align-items: center;
              padding: 10px;

              .icon {
                img {
                  width: 60px;
                }
              }

              .vote-type {
                color: $df-blue-color;
                font-size: 14px;
              }
            }

            .time {
              padding: 3px;
              text-align: center;
              width: 100%;
              font-size: 12px;
              border-radius: 3px;
            }
          }
        }
      }

      .active-votes {
        .list {
          .item {
            .time {
              background-color: $df-blue-color;
              color: white;
            }
          }
        }
      }

      .next-votes {
        margin-top: 25px;

        .list {
          .item {
            cursor: default;

            .time {
              color: $df-mdl-dark-black-color;
              background-color: #dadada;
            }
          }
        }
      }
    }
  }

  .team {
    .team-info {
      position: relative;

      .item {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 15px;

        &.team-code {
          .inner-content {
            background-color: $df-very-light-blue-color;
            color: $df-blue-color;
            padding: 4px 7px;
            border-radius: 4px;
            cursor: pointer;
          }
        }

        &.team-image {
          position: absolute;
          right: 20px;
          top: 20px;

          img {
            width: 120px;
            height: 120px;
            border-radius: 100%;
          }
        }

        .inner-content {
          margin-top: 4px;
        }
      }
    }
  }
}
</style>
