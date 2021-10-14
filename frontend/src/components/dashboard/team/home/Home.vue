<template>
  <create-vote-popup
      @handlePopup="handleCreateVotePopup"
      :is-enable="isEnableCreateVotePopup"/>
  <div class="home">
    <div class="votes">
      <div class="title votes-title">
        <div class="txt">
          <i class="bi bi-archive"></i>
          Oylamalar
        </div>
        <div @click="handleCreateVotePopup" class="create-vote">
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
            <!-- <div class="no-data">
              <img src="../../../../assets/icons/no-vote.png"/>
              <div class="text">
                Aktif oylama hiç yok
              </div>
            </div>-->
            <div class="item">
              <div class="top">
                <div class="voted-percentage">
                  %56
                </div>
                <div class="icon">
                  <img src="../../../../assets/icons/power-vote.png" alt="power-vote"/>
                </div>
                <div class="vote-name">
                  Güç Oylaması
                </div>
              </div>
              <div class="time">
                <i class="bi bi-stopwatch-fill"></i>
                1 gün 12 saat
              </div>
            </div>
            <div class="item voted">
              <div class="top">
                <div class="voted-percentage">
                  %56
                </div>
                <div class="icon">
                  <img src="../../../../assets/icons/power-vote.png" alt="power-vote"/>
                </div>
                <div class="vote-name">
                  Güç Oylaması
                </div>
              </div>
              <div class="time">
                <i class="bi bi-check-all"></i>
                Oy Verilmiş !
              </div>
            </div>
            <div class="item">
              <div class="top">
                <div class="voted-percentage">
                  %56
                </div>
                <div class="icon">
                  <img src="../../../../assets/icons/classic-vote.png" alt="classic-vote"/>
                </div>
                <div class="vote-name">
                  Bu bir örnek klasik oylama yazısıdır.
                </div>
              </div>
              <div class="time">
                <i class="bi bi-stopwatch-fill"></i>
                1 gün 12 saat
              </div>
            </div>
            <div class="item voted">
              <div class="top">
                <div class="voted-percentage">
                  %56
                </div>
                <div class="icon">
                  <img src="../../../../assets/icons/power-vote.png" alt="power-vote"/>
                </div>
                <div class="vote-name">
                  Güç Oylaması
                </div>
              </div>
              <div class="time">
                Oy Verilmiş !
              </div>
            </div>
            <div class="item">
              <div class="top">
                <div class="voted-percentage">
                  %56
                </div>
                <div class="icon">
                  <img src="../../../../assets/icons/classic-vote.png" alt="classic-vote"/>
                </div>
                <div class="vote-name">
                  Bu bir örnek klasik oylama yazısıdır.
                </div>
              </div>
              <div class="time">
                <i class="bi bi-stopwatch-fill"></i>
                1 gün 12 saat
              </div>
            </div>
            <div class="item">
              <div class="top">
                <div class="voted-percentage">
                  %56
                </div>
                <div class="icon">
                  <img src="../../../../assets/icons/classic-vote.png" alt="classic-vote"/>
                </div>
                <div class="vote-name">
                  Para Paylaşımı
                </div>
              </div>
              <div class="time">
                <i class="bi bi-stopwatch-fill"></i>
                1 gün 12 saat
              </div>
            </div>
          </div>
        </div>
        <div class="next-votes">
          <div class="content-title">
            Gelecek Oylamalar
            <info-tooltip text="İnfo text text text teasdaod asdıaı sdsajsadı uerwejır" class="next-vote-info"/>
          </div>
          <div class="list">
            <!-- <div class="no-data">
              <img src="../../../../assets/icons/no-vote.png"/>
              <div class="text">
                Gelecek oylama hiç yok
              </div>
            </div>-->
            <div class="item">
              <div class="top">
                <div class="icon">
                  <img src="../../../../assets/icons/power-vote.png" alt="power-vote"/>
                </div>
                <div class="vote-name">
                  Güç Oylaması
                </div>
              </div>
              <div class="time">
                <i class="bi bi-clock-fill"></i>
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
          <img src="../../../../assets/test/team.png" alt="team-image"/>
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
        <div class="item">
          <div class="content-title">
            Toplama Oylama Sayısı
          </div>
          <div class="inner-content">
            23 oylama
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CreateVotePopup from './CreateVote/CreateVotePopup';
import InfoTooltip from '../../../shared/InfoTooltip';

export default {
  name: 'TeamHOme',
  data() {
    return {
      isEnableCreateVotePopup: true
    };
  },
  components: {
    CreateVotePopup,
    InfoTooltip
  },
  methods: {
    handleCreateVotePopup() {
      this.isEnableCreateVotePopup = !this.isEnableCreateVotePopup;
    }
  }
};
</script>

<style lang="scss" scoped>
.home {
  display: flex;
  justify-content: space-between;
  height: 100%;

  > div {
    width: 48%;
    display: flex;
    flex-direction: column;
    justify-content: stretch;

    > .title {
      font-weight: 500;
      font-size: 17px;
      color: $df-dark-blue-color;
    }

    //TODO: overflow problem
    .content {
      @include center-lg-box-shadow;
      height: 100%;
      padding: 15px;
      border-radius: 5px;
      margin-top: 10px;

      .content-title {
        font-weight: 400;
        font-size: 14px;
        color: #484848;
      }
    }
  }

  .votes {
    .votes-title {
      display: flex;
      align-items: center;

      .create-vote {
        @include center-lg-green-box-shadow;
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
        height: 50%;
        overflow: hidden;

        .list {
          overflow: auto;
          height: 100%;
          display: flex;
          flex-wrap: wrap;
          justify-content: space-between;

          &::-webkit-scrollbar {
            width: 3px;
          }

          .no-data {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;

            img {
              width: 70px;
            }

            .text {
              font-weight: 300;
              font-size: 14px;
              color: #898989;
              margin-top: 10px;
            }
          }

          .item {
            width: 130px;
            // min-width: 120px;
            // width: 20%;
            margin: 12px 14px;
            cursor: pointer;
            border-radius: 5px;
            transition: .2s;

            .top {
              background-color: white;
              display: flex;
              flex-direction: column;
              align-items: center;
              padding: 15px 7px;
              border: 1px solid #eeeeee;
              border-bottom: 0;
              border-radius: 5px 5px 0 0;
              transition: .3s;

              .icon {
                img {
                  width: 45px;
                }
              }

              .vote-name {
                width: 100%;
                height: 100%;
                font-size: 13px;
                text-overflow: ellipsis;
                white-space: nowrap;
                overflow: hidden;
                text-align: center;
              }
            }

            .time {
              padding: 3px;
              text-align: center;
              width: 100%;
              font-size: 12px;
              border-radius: 0 0 5px 5px;
            }
          }
        }
      }

      .active-votes {
        .list {
          .item {
            &:hover .top {
              background-color: #f2f6ff;
              border-color: $df-blue-color;
            }

            &.voted {
              cursor: default;

              .top {
                &:hover {
                  background-color: inherit;
                  border-color: inherit;
                }
              }

              .time {
                background-color: $df-green-color;
              }
            }

            .top {
              position: relative;

              .voted-percentage {
                font-size: 10px;
                position: absolute;
                left: 4px;
                top: 4px;
                color: $df-mdl-dark-black-color;
                background-color: #eeeeee;
                // background-color: $df-green-color;
                // color: white;
                padding: 2px 5px;
                border-radius: 20px;
              }

              .vote-name {
                color: $df-blue-color;
              }
            }

            .time {
              background-color: $df-blue-color;
              color: white;
            }
          }
        }
      }

      .next-votes {
        margin-top: 25px;

        .content-title {
          display: flex;

          .next-vote-info {
            margin-left: 10px;
          }
        }

        .list {
          .item {
            cursor: default;

            &:hover .top {
              border-color: #dadada;
              background-color: #f8f8f8;
            }

            .top {
              .vote-name {
                color: $df-mdl-dark-black-color;
              }
            }

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
        margin-bottom: 30px;

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
            @include center-lg-box-shadow;
            width: 120px;
            height: 120px;
            border-radius: 100%;
          }
        }

        .inner-content {
          margin-top: 4px;
          font-size: 15px;
        }
      }
    }
  }
}

@media only screen and (max-width: 1250px) {

}
</style>
