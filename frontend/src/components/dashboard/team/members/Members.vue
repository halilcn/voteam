<template>
  <user-invitation-popup :is-enable="isEnableUserInvitationPopup"
                         @handlePopup="toggleUserInvitationPopup"/>
  <page-title>
    <i class="bi bi-people"></i>
    Üyeler
  </page-title>
  <div class="users">
    <div class="users-actions">
      <div @click="toggleUserInvitationPopup" class="add-user-btn">
        <i class="bi bi-person-plus"></i>
        Üye Daveti
      </div>
    </div>
    <div class="user-list">
      <div class="item">
        <div class="top">
          <div class="profile-info">
            <img class="user-image"
                 src="https://res.cloudinary.com/voteam/image/upload/v1638612621/vote-images/xpmplop9dicpgn5idh61.png">
            <div class="user-texts">
              <div class="user-name">
                Halil Can
              </div>
              <div class="user-role">
                üye
              </div>
            </div>
          </div>
        </div>
        <div class="bottom">
          <div class="user-info-list">
            <div class="item">
              <div class="title">
                Toplam Başlatılan Oylama
              </div>
              <div class="content">
                4
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="top">
          <div class="profile-info">
            <img class="user-image"
                 src="https://res.cloudinary.com/voteam/image/upload/v1638612621/vote-images/xpmplop9dicpgn5idh61.png">
            <div class="user-texts">
              <div class="user-name">
                Halil Can
              </div>
              <div class="user-role">
                üye
              </div>
            </div>
          </div>
        </div>
        <div class="bottom">
          <div class="user-info-list">
            <div class="item">
              <div class="title">
                Toplam Başlatılan Oylama
              </div>
              <div class="content">
                4
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="top">
          <div class="profile-info">
            <img class="user-image"
                 src="https://res.cloudinary.com/voteam/image/upload/v1638612621/vote-images/xpmplop9dicpgn5idh61.png">
            <div class="user-texts">
              <div class="user-name">
                Halil Can
              </div>
              <div class="user-role">
                üye
              </div>
            </div>
          </div>
        </div>
        <div class="bottom">
          <div class="user-info-list">
            <div class="item">
              <div class="title">
                Toplam Başlatılan Oylama
              </div>
              <div class="content">
                4
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="top">
          <div class="profile-info">
            <img class="user-image"
                 src="https://res.cloudinary.com/voteam/image/upload/v1638612621/vote-images/xpmplop9dicpgn5idh61.png">
            <div class="user-texts">
              <div class="user-name">
                Halil Can
              </div>
              <div class="user-role">
                üye
              </div>
            </div>
            <info-tooltip
                class="user-waiting-invitation"
                iconClass="bi bi-hourglass-split"
                text="Davet bekliyor..."/>
          </div>
        </div>
        <div class="bottom">
          <div class="user-info-list">
            <div class="item">
              <div class="title">
                <i class="fas fa-poll"></i>
                Toplam Başlatılan Oylama
              </div>
              <div class="content">
                4
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="top">
          <div class="profile-info">
            <img class="user-image"
                 src="https://res.cloudinary.com/voteam/image/upload/v1638612621/vote-images/xpmplop9dicpgn5idh61.png">
            <div class="user-texts">
              <div class="user-name">
                Halil Can
              </div>
              <div class="user-role">
                üye
              </div>
            </div>
            <div class="user-waiting-invitation">
              <!-- <i class="fas fa-user-clock"></i>-->
              <i class="bi bi-hourglass-split"></i>
            </div>
          </div>
        </div>
        <div class="bottom">
          <div class="user-info-list">
            <div class="item">
              <div class="title">
                Toplam Başlatılan Oylama
              </div>
              <div class="content">
                4
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="top">
          <div class="profile-info">
            <img class="user-image"
                 src="https://res.cloudinary.com/voteam/image/upload/v1638612621/vote-images/xpmplop9dicpgn5idh61.png">
            <div class="user-texts">
              <div class="user-name">
                Halil Can
              </div>
              <div class="user-role">
                üye
              </div>
            </div>
            <div class="user-waiting-invitation">
              <!-- <i class="fas fa-user-clock"></i>-->
              <i class="bi bi-hourglass-split"></i>
            </div>
          </div>
        </div>
        <div class="bottom">
          <div class="user-info-list">
            <div class="item">
              <div class="title">
                Toplam Başlatılan Oylama
              </div>
              <div class="content">
                4
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="top">
          <div class="profile-info">
            <img class="user-image"
                 src="https://res.cloudinary.com/voteam/image/upload/v1638612621/vote-images/xpmplop9dicpgn5idh61.png">
            <div class="user-texts">
              <div class="user-name">
                Halil Can
              </div>
              <div class="user-role">
                üye
              </div>
            </div>
            <div class="user-waiting-invitation">
              <!-- <i class="fas fa-user-clock"></i>-->
              <i class="bi bi-hourglass-split"></i>
            </div>
          </div>
        </div>
        <div class="bottom">
          <div class="user-info-list">
            <div class="item">
              <div class="title">
                Toplam Başlatılan Oylama
              </div>
              <div class="content">
                4
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="top">
          <div class="profile-info">
            <img class="user-image"
                 src="https://res.cloudinary.com/voteam/image/upload/v1638612621/vote-images/xpmplop9dicpgn5idh61.png">
            <div class="user-texts">
              <div class="user-name">
                Halil Can
              </div>
              <div class="user-role">
                üye
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
            <div class="item">
              <div class="title">
                Toplam Başlatılan Oylama
              </div>
              <div class="content">
                4
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="top">
          <div class="profile-info">
            <img class="user-image"
                 src="https://res.cloudinary.com/voteam/image/upload/v1638612621/vote-images/xpmplop9dicpgn5idh61.png">
            <div class="user-texts">
              <div class="user-name">
                Halil Can
              </div>
              <div class="user-role">
                üye
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
            <div class="item no-votes">
              <i class="bi bi-emoji-frown"></i>
              Henüz oylama başlatmamış
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import PageTitle from '../shared/PageTitle';
import InfoTooltip from '../../../shared/InfoTooltip';
import UserInvitationPopup from './UserInvitationPopup';
import { mapActions } from 'vuex';

export default {
  name: 'Members',
  data() {
    return {
      isEnableUserInvitationPopup: false
    };
  },
  components: {
    PageTitle,
    InfoTooltip,
    UserInvitationPopup
  },
  methods: {
    ...mapActions('teamUser', ['getUsersOfTeam']),
    toggleUserInvitationPopup() {
      this.isEnableUserInvitationPopup = !this.isEnableUserInvitationPopup;
    }
  },
  created() {
    this.getUsersOfTeam();
  }
};
</script>

<style lang="scss" scoped>
$item-border-color: #dde6f8;

.users {
  .users-actions {
    display: flex;

    .add-user-btn {
      background-color: $df-blue-color;
      color: white;
      margin-left: auto;
      padding: 5px 10px;
      cursor: pointer;
      border-radius: 4px;
      font-size: 15px;
      transition: .2s;

      &:hover {
        background-color: $df-blue-color-hover-dark;
      }

      i {
        margin-right: 6px;
      }
    }
  }

  .user-list {
    margin-top: 30px;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;

    > .item {
      display: flex;
      flex-direction: column;
      border: 1px solid $item-border-color;
      background-color: #fbfcff;
      width: 250px;
      border-radius: 5px;
      //margin-right: 20px;
      margin-bottom: 20px;
      transition: .2s;

      &:hover, &:hover .bottom {
        //  transform: scale(1.04);
        border-color: #b2cdff;
      }

      &:hover .top .profile-info .delete-user-btn {
        opacity: 1;
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
            font-size: 12px;
            margin-left: auto;
            background-color: $df-very-light-red-color;
            color: $df-red-color;
            padding: 3px 6px;
            cursor: pointer;
            border-radius: 4px;
            opacity: 0;
            transition: .2s;

            &:hover {
              background-color: #ffe5e5;
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

        .user-info-list {
          padding: 12px;

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

              i {
                margin-right: 6px;
              }
            }

            .title {
              font-size: 13px;
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
  .user-list > .item {
    &:nth-child(2n+1) {

    }
  }
}
</style>
