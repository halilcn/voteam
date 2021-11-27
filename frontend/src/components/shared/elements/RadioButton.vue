<template>
  <label :for="id" class="radio-btn-container">
   <span class="radio-btn-input">
      <input type="radio"
             :id="id"
             :name="name">
   </span>
    <span class="content">
    <slot name="content"/>
    </span>
  </label>
</template>

<script>
export default {
  name: 'RadioButton',
  props: {
    id: {
      type: String,
      required: true
    },
    name: {
      type: String,
      required: false,
      default: 'radio_btn_name'
    }
  }
};
</script>

<style lang="scss" scoped>
.radio-btn-container {
  display: flex;
  align-items: center;
  cursor: pointer;

  .content {
    width: 100%;
    margin-left: 12px;
  }

  .radio-btn-input {
    width: 20px;
    height: 20px;
  }
}


@supports (-webkit-appearance: none) or (-moz-appearance: none) {
  input[type='radio'] {
    --active: #275EFE;
    --active-inner: #fff;
    --focus: 2px rgba(39, 94, 254, .3);
    --border: #BBC1E1;
    --border-hover: #275EFE;
    --background: #fff;
    --disabled: #F6F8FF;
    --disabled-inner: #E1E6F9;
    -webkit-appearance: none;
    -moz-appearance: none;
    height: 21px;
    outline: none;
    display: inline-block;
    vertical-align: top;
    position: relative;
    margin: 0;
    cursor: pointer;
    border: 1px solid var(--bc, var(--border));
    background: var(--b, var(--background));
    transition: background .3s, border-color .3s, box-shadow .2s;

    &:after {
      content: '';
      display: block;
      left: 0;
      top: 0;
      position: absolute;
      transition: transform var(--d-t, .3s) var(--d-t-e, ease), opacity var(--d-o, .2s);
    }

    &:checked {
      --b: var(--active);
      --bc: var(--active);
      --d-o: .3s;
      --d-t: .6s;
      --d-t-e: cubic-bezier(.2, .85, .32, 1.2);
    }

    &:disabled {
      --b: var(--disabled);
      cursor: not-allowed;
      opacity: .9;

      &:checked {
        --b: var(--disabled-inner);
        --bc: var(--border);
      }
    }

    &:hover {
      &:not(:checked) {
        &:not(:disabled) {
          --bc: var(--border-hover);
        }
      }
    }

    &:focus {
      box-shadow: 0 0 0 var(--focus);
    }

    &:not(.switch) {
      width: 21px;

      &:after {
        opacity: var(--o, 0);
      }

      &:checked {
        --o: 1;
      }
    }
  }
  input[type='radio'] {
    border-radius: 50%;

    &:after {
      width: 19px;
      height: 19px;
      border-radius: 100%;
      background: var(--active-inner);
      opacity: 0;
      transform: scale(var(--s, .7));
    }

    &:checked {
      --s: .5;
    }
  }
}
</style>
