<template>
    <div
        class="modal fade"
        :id="modalId"
        tabindex="-1"
        :aria-labelledby="`${modalId}Label`"
        aria-hidden="false"
        ref="modalRef"
        @hidden.bs.modal="handleModalHidden"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" :id="`${modalId}Label`">{{ title }}</h5>
                    <button
                        type="button"
                        class="btn-close"
                        @click="close"
                        aria-label="Close"
                    >
                    </button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
                <!-- Only show footer if hideFooter is false -->
                <div class="modal-footer" v-if="!hideFooter">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        @click="close"
                    >
                        {{ cancelText }}
                    </button>
                    <button
                        type="button"
                        class="btn btn-primary"
                        @click="confirm"
                        :disabled="loading"
                    >
                        <i class="fas fa-spinner fa-spin mr-1" v-if="loading"></i>
                        {{ confirmText }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, nextTick } from 'vue';
import { Modal } from 'bootstrap';

const props = defineProps({
    modalId: {
        type: String,
        required: true
    },
    title: {
        type: String,
        default: 'Modal Title'
    },
    confirmText: {
        type: String,
        default: 'Save Changes'
    },
    cancelText: {
        type: String,
        default: 'Close'
    },
    loading: {
        type: Boolean,
        default: false
    },
    hideFooter: {
        type: Boolean,
        default: false
    }
});

const emit = defineEmits(['confirm', 'close']);
const modalRef = ref(null);
let bootstrapModal = null;
let previousActiveElement = null;

const show = async () => {
    await nextTick();
    try {
        // Store the currently active element
        previousActiveElement = document.activeElement;

        if (!bootstrapModal) {
            if (modalRef.value) {
                bootstrapModal = new Modal(modalRef.value, {
                    backdrop: 'static',
                    keyboard: false
                });
            } else {
                console.error('Modal reference not found');
                return;
            }
        }

        bootstrapModal.show();
    } catch (error) {
        console.error('Error showing modal:', error);
    }
};

const close = async () => {
    try {
        if (bootstrapModal) {
            bootstrapModal.hide();
        }

        // Restore focus to the previous active element
        await nextTick();
        if (previousActiveElement && typeof previousActiveElement.focus === 'function') {
            previousActiveElement.focus();
        }

        emit('close');
    } catch (error) {
        console.error('Error closing modal:', error);
    }
};

const handleModalHidden = () => {
    try {
        emit('close');
    } catch (error) {
        console.error('Error in modal hidden handler:', error);
    }
};

const cleanup = () => {
    try {
        if (bootstrapModal) {
            bootstrapModal.dispose();
            bootstrapModal = null;
        }
    } catch (error) {
        console.error('Error cleaning up modal:', error);
    }
};

const confirm = async () => {
    try {
        await nextTick();
        emit('confirm');
    } catch (error) {
        console.error('Error in modal confirm:', error);
    }
};

onMounted(() => {
    try {
        if (modalRef.value) {
            bootstrapModal = new Modal(modalRef.value, {
                backdrop: 'static',
                keyboard: false
            });
        }
    } catch (error) {
        console.error('Error initializing modal:', error);
    }
});

onUnmounted(() => {
    cleanup();
});

defineExpose({
    show,
    close,
    modal: bootstrapModal,
    cleanup
});
</script>

<style>
/* Dark mode styles will be handled by AdminLTE's dark mode class on body */
.dark-mode .modal-content {
    background-color: #343a40;
    border: none;
}

.dark-mode .modal-header {
    background-color: #343a40;
    border: none;
    color: #fff;
}

.dark-mode .modal-body {
    color: #fff;
}

.dark-mode .modal-footer {
    background-color: #343a40;
    border: none;
}

.dark-mode .btn-close {
    filter: invert(1) grayscale(100%) brightness(200%);
}

.dark-mode .form-control {
    background-color: #454d55;
    border-color: #6c757d;
    color: #fff;
}

.dark-mode .form-control:focus {
    background-color: #454d55;
    border-color: #80bdff;
    color: #fff;
}

.dark-mode label {
    color: #fff;
}
</style>
