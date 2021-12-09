<template>
  <loading-animation
      v-if="isLoading"
      :text-line-count="10"/>
  <div v-else class="user-list">
    <div
        v-for="(user,index) in users"
        :key="index"
        class="item-container">
      <div class="item">
        <div class="top">
          <div class="profile-info">
            <img class="user-image"
                 :src="user.image"
                 alt="user-image">
            <div class="user-texts">
              <div class="user-name">
                {{ user.name }}
              </div>
              <div class="user-role">
                {{ convertRoleOfMemberToLocalLanguage(user.role) }}
              </div>
            </div>
            <div class="delete-user-btn">
              <i class="bi bi-person-dash"></i>
              çıkar
            </div>
          </div>
        </div>
        <div class="bottom">
          <div class="user-info-list">
            <div v-if="user.votes_count > 0" class="item">
              <div class="title">
                <i class="far fa-chart-bar"></i>
                Toplam Oylama
              </div>
              <div class="content">
                {{ user.votes_count }}
              </div>
            </div>
            <div v-else class="item no-votes">
              <i class="bi bi-emoji-frown"></i>
              Henüz oylama başlatmamış
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
        v-for="(invitation,index) in userInvitations"
        :key="index"
        class="item-container">
      <div class="item user-waiting-invitation">
        <div class="content">
          <div class="info">
            <div class="text">
              <i class="bi bi-envelope"></i>
              Davetiye gönderildi
            </div>
            <div class="time">
              ({{ $dayjs($helpers.convertTimeToLocalTime(invitation.created_at)).fromNow() }})
            </div>
          </div>
          <div class="user-info">
            <div class="email">
              {{ invitation.email }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LoadingAnimation from '../../../shared/LoadingAnimation';

export default {
  name: 'MembersList',
  props: ['users', 'userInvitations', 'isLoading'],
  components: {
    LoadingAnimation
  },
  methods: {
    convertRoleOfMemberToLocalLanguage(role) {
      //TODO:multiple language!
      return role;
    }
  }
};
</script>

<style lang="scss" scoped>
$item-border-color: #dde6f8;

.user-list {
  height: 100%;
  overflow-y: auto;
  //background-color: blue;
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  margin-top: 15px;


  &::-webkit-scrollbar {
    width: 6px;
  }

  .item-container {
    display: flex;
    justify-content: center;
    //background-color: red;
    height: 125px; // !
    width: 20%;
    margin: 10px 0;

    > .item {
      display: flex;
      flex-direction: column;
      border: 1px solid $item-border-color;
      background-color: #fbfcff;
      width: 250px;
      height: 125px;
      border-radius: 5px;
      //margin-right: 20px;
      transition: .2s;

      &:hover, &:hover .bottom {
        //  transform: scale(1.04);
        border-color: #b2cdff;
      }

      &:hover .top .profile-info .delete-user-btn {
        opacity: 1;
      }

      &.user-waiting-invitation {
        padding: 12px;
        font-size: 13px;
        border-color: #93eac7;
        text-align: center;

        .content {
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          height: 100%;

          .info {
            .text {
              font-weight: 500;
              color: $df-green-color;

              i {
                margin-right: 4px;
              }
            }

            .time {
              font-style: italic;
              font-weight: 300;
              color: $df-black-and-blue-color;
            }
          }

          .user-info {
            margin-top: 10px;

            .email {
              background-color: $df-very-light-blue-color;
              color: $df-blue-color;
              padding: 3px 10px;
              border-radius: 4px;
              margin-top: 5px;
            }
          }
        }


      }

      .top {
        padding: 12px;

        .profile-info {
          display: flex;
          align-items: center;

          //TOD: aynı css, dynamic hale getirmek ?

          .user-image {
            width: 50px;
            height: 50px;
            border-radius: 100%;
          }

          .user-texts {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-left: 10px;

            .user-name {
              font-size: 15px;
              color: $df-dark-blue-color;
            }

            .user-role {
              padding: 2px 6px;
              font-weight: 300;
              font-size: 11px;
              color: $df-blue-color;
              background-color: $df-very-light-blue-color;
              border-radius: 3px;
            }
          }

          .user-waiting-invitation {
            margin-left: auto !important;
          }

          .delete-user-btn {
            border: 1px solid $df-very-light-red-color;
            font-size: 12px;
            margin-left: auto;
            //background-color: $df-very-light-red-color;
            color: $df-red-color;
            padding: 3px 6px;
            cursor: pointer;
            border-radius: 4px;
            opacity: 0;
            transition: .2s;

            &:hover {
              background-color: $df-very-light-red-color;
            }

            i {
              margin-right: 3px;
            }
          }
        }
      }

      .bottom {
        transition: .2s; // TODO:dynamic
        border-top: 1px solid $item-border-color;
        height: 100%;


        .user-info-list {
          padding: 12px;
          height: 100%;
          display: flex;
          flex-direction: column;
          justify-content: center;

          .item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: $df-black-and-blue-color;
            font-weight: 300;

            &.no-votes {
              font-style: italic;
              font-size: 12px;
              justify-content: center;
              color: #909fb0;

              i {
                margin-right: 6px;
              }
            }

            .title {
              display: flex;
              align-items: center;
              font-size: 13px;

              i {
                margin-right: 7px;
              }
            }

            .content {
            }
          }
        }
      }
    }
  }
}

@media only screen and (max-width: 1420px) {
  .user-list > .item-container {
    width: 25% !important;
  }
}

@media only screen and (max-width: 1160px) {
  .user-list > .item-container {
    width: 33.33% !important;
  }
}

@media only screen and (max-width: 920px) {
  .user-list > .item-container {
    width: 50% !important;
  }
}
</style>
