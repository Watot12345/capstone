/**
 * Modal System - Centralized Modal & UI Utilities
 * 
 * Provides reusable modal controls, confirmation dialogs, and UI helpers
 * used across all modules.
 * 
 * DEPENDENCIES:
 *   - toast.php (via footer.php) for toast notifications
 *   - Font Awesome for icons in dynamic modals
 *   - Data Masking System (data-masking.php) - optional
 * 
 * USAGE:
 *   ModalSystem.open('modalId');
 *   ModalSystem.close('modalId');
 *   ModalSystem.confirm('Delete this record?', () => { ... });
 *   ModalSystem.toast.success('Saved!');
 *   ModalSystem.toast.error('Failed!');
 */

const ModalSystem = (function() {
    'use strict';

    // ============================================================
    // DATA MASKING INTEGRATION
    // ============================================================
    
    /**
     * Apply data masking to modal content
     * Delegate to the main data-mask.php system
     * @param {string|HTMLElement} modal - Modal ID or element
     */
    function applyMaskingToModal(modal) {
    if (typeof modal === 'string') {
        modal = document.getElementById(modal);
    }
    if (!modal) return;
    
    // Use the exposed global state from data-mask.php
    let shouldBeMasked = true;
    
    // Check if the global isDataMasked exists (exposed from data-mask.php)
    if (typeof window.isDataMasked !== 'undefined') {
        shouldBeMasked = window.isDataMasked();
        console.log('✅ Using global state from data-mask.php:', shouldBeMasked ? 'HIDDEN' : 'VISIBLE');
    } else {
        // Fallback to localStorage
        const isMasked = localStorage.getItem('data_masking_enabled');
        shouldBeMasked = isMasked === null ? true : isMasked === 'true';
        console.log('⚠️ Using localStorage fallback:', shouldBeMasked ? 'HIDDEN' : 'VISIBLE');
    }
    
    // Handle regular maskable elements
    const maskableElements = modal.querySelectorAll('.maskable');
    maskableElements.forEach(el => {
        if (shouldBeMasked) {
            el.classList.add('masked');
            if (el.tagName === 'INPUT') {
                el.classList.add('input-maskable');
                el.style.color = 'transparent';
            }
        } else {
            el.classList.remove('masked');
            el.classList.remove('input-maskable');
            el.style.color = '';
            if (el.tagName === 'INPUT' && el.dataset.real) {
                el.value = el.dataset.real;
            }
        }
    });
}

    /**
     * Toggle data masking for all elements
     * Delegate to the main data-mask.php system
     */
    function toggleMasking() {
        if (typeof window.toggleDataMask !== 'undefined') {
            window.toggleDataMask();
        } else {
            console.warn('Data masking system not loaded');
        }
    }

    /**
     * Get current masking state
     */
    function isMasked() {
        if (typeof window.isDataMasked !== 'undefined') {
            return window.isDataMasked();
        }
        const isMasked = localStorage.getItem('data_masking_enabled');
        return isMasked === null ? true : isMasked === 'true';
    }

    /**
     * Refresh masking on a specific modal
     * @param {string} id - Modal ID
     */
    function refreshMasking(id) {
        const modal = document.getElementById(id);
        if (modal) {
            applyMaskingToModal(modal);
        }
    }

    // ============================================================
    // PUBLIC: Open/Close Modals
    // ============================================================
    
    /**
     * Open a modal by element ID
     * @param {string} id - The modal element's ID
     * @param {object} options - Optional: { applyMasking: boolean, onOpen: function }
     */
    function open(id, options) {
    options = options || {};
    var modal = document.getElementById(id);
    if (!modal) {
        console.warn('ModalSystem.open: Element #' + id + ' not found');
        return;
    }
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.classList.add('overflow-hidden');
    
    // Apply masking if requested (default: true)
    if (options.applyMasking !== false) {
        setTimeout(function() {
            applyMaskingToModal(modal);
            console.log('🔄 Masking applied to modal:', id);
        }, 150);
    }
    
    // Call onOpen callback
    if (typeof options.onOpen === 'function') {
        options.onOpen(modal);
    }
}

    /**
     * Close a modal by element ID
     * @param {string} id - The modal element's ID
     * @param {object} options - Optional: { onClose: function }
     */
    function close(id, options) {
        options = options || {};
        var modal = document.getElementById(id);
        if (!modal) {
            console.warn('ModalSystem.close: Element #' + id + ' not found');
            return;
        }
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
        
        // Call onClose callback
        if (typeof options.onClose === 'function') {
            options.onClose(modal);
        }
    }

    /**
     * Check if any modal is currently open
     * @returns {boolean}
     */
    function isAnyOpen() {
        var modals = document.querySelectorAll('.fixed.inset-0');
        for (var i = 0; i < modals.length; i++) {
            if (modals[i].id && !modals[i].classList.contains('hidden')) {
                return true;
            }
        }
        return false;
    }

    // ============================================================
    // PUBLIC: Confirmation Dialog with Masking
    // ============================================================

    /**
     * Show a confirmation dialog
     * @param {string} message - The confirmation message
     * @param {function} onConfirm - Callback when confirmed
     * @param {object} [options] - Optional: { title, confirmText, cancelText, type, applyMasking }
     */
    function confirm(message, onConfirm, options) {
        options = options || {};
        var title = options.title || 'Confirm Action';
        var confirmText = options.confirmText || 'Confirm';
        var cancelText = options.cancelText || 'Cancel';
        var type = options.type || 'danger';
        var applyMasking = options.applyMasking !== false;
        
        var iconColors = {
            danger: 'bg-rose-50 text-rose-500',
            warning: 'bg-amber-50 text-amber-500',
            info: 'bg-blue-50 text-blue-500'
        };
        var iconClasses = {
            danger: 'fa-trash-can',
            warning: 'fa-triangle-exclamation',
            info: 'fa-circle-info'
        };
        var btnColors = {
            danger: 'bg-rose-600 hover:bg-rose-700',
            warning: 'bg-amber-600 hover:bg-amber-700',
            info: 'bg-brand-dark hover:bg-brand-medium'
        };

        var iconColor = iconColors[type] || iconColors.danger;
        var iconClass = iconClasses[type] || iconClasses.danger;
        var btnColor = btnColors[type] || btnColors.danger;

        var modalId = 'modal-system-confirm-' + Date.now();
        var overlay = document.createElement('div');
        overlay.id = modalId;
        overlay.className = 'hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-[9999] items-center justify-center p-4';
        overlay.innerHTML = 
            '<div class="bg-white rounded-2xl shadow-xl w-full max-w-sm" onclick="event.stopPropagation()">' +
                '<div class="p-6 text-center">' +
                    '<div class="w-12 h-12 rounded-full ' + iconColor + ' flex items-center justify-center mx-auto mb-4">' +
                        '<i class="fa-solid ' + iconClass + '"></i>' +
                    '</div>' +
                    '<h3 class="font-bold text-slate-900 mb-1">' + escapeHtml(title) + '</h3>' +
                    '<p class="text-sm text-slate-500">' + escapeHtml(message) + '</p>' +
                '</div>' +
                '<div class="flex gap-2 px-6 pb-6">' +
                    '<button type="button" class="flex-1 px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg hover:bg-slate-50 transition text-sm font-semibold modal-confirm-cancel">' +
                        escapeHtml(cancelText) +
                    '</button>' +
                    '<button type="button" class="flex-1 px-4 py-2 text-white rounded-lg transition text-sm font-semibold modal-confirm-ok ' + btnColor + '">' +
                        escapeHtml(confirmText) +
                    '</button>' +
                '</div>' +
            '</div>';

        document.body.appendChild(overlay);

        // Event handlers
        overlay.addEventListener('click', function() {
            close(modalId, { onClose: cleanup });
        });

        overlay.querySelector('.modal-confirm-cancel').addEventListener('click', function() {
            close(modalId, { onClose: cleanup });
        });

        overlay.querySelector('.modal-confirm-ok').addEventListener('click', function() {
            close(modalId, { onClose: cleanup });
            if (typeof onConfirm === 'function') {
                onConfirm();
            }
        });

        function cleanup() {
            setTimeout(function() {
                var el = document.getElementById(modalId);
                if (el && el.parentNode) {
                    el.parentNode.removeChild(el);
                }
            }, 500);
        }

        open(modalId, { applyMasking: applyMasking });
        return modalId;
    }

    // ============================================================
    // PUBLIC: Dynamic Modal Creator with Masking
    // ============================================================

    /**
     * Create a modal dynamically
     * @param {object} options - { id, title, icon, size, content, footer, onClose, applyMasking }
     * @returns {string} The modal element ID
     */
    function createModal(options) {
        options = options || {};
        var id = options.id || 'modal-system-dynamic-' + Date.now();
        var title = options.title || '';
        var icon = options.icon || 'fa-circle';
        var size = options.size || 'max-w-2xl';
        var content = options.content || '';
        var footer = options.footer || '';
        var onClose = options.onClose || null;
        var applyMasking = options.applyMasking !== false;

        // Prevent duplicate IDs
        if (document.getElementById(id)) {
            console.warn('ModalSystem.createModal: ID "' + id + '" already exists');
            return id;
        }

        var modal = document.createElement('div');
        modal.id = id;
        modal.className = 'hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 items-center justify-center p-4';
        modal.innerHTML = 
            '<div class="bg-white rounded-2xl shadow-xl w-full ' + size + ' max-h-[90vh] overflow-y-auto" onclick="event.stopPropagation()">' +
                '<div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 sticky top-0 bg-white rounded-t-2xl z-10">' +
                    '<h3 class="font-bold text-slate-900 flex items-center gap-2">' +
                        '<i class="fa-solid ' + icon + ' text-brand-medium"></i> ' + escapeHtml(title) +
                    '</h3>' +
                    '<button class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition modal-close-btn">' +
                        '<i class="fa-solid fa-xmark"></i>' +
                    '</button>' +
                '</div>' +
                '<div class="p-6">' + content + '</div>' +
                (footer ? '<div class="flex justify-end gap-2 px-6 pb-6 border-t border-slate-100 pt-4">' + footer + '</div>' : '') +
            '</div>';

        document.body.appendChild(modal);

        // Close handlers
        var closeBtns = modal.querySelectorAll('.modal-close-btn');
        for (var i = 0; i < closeBtns.length; i++) {
            closeBtns[i].addEventListener('click', function() {
                close(id, { onClose: onClose });
            });
        }

        modal.addEventListener('click', function() {
            close(id, { onClose: onClose });
        });

        // Apply masking if requested
        if (applyMasking) {
            setTimeout(function() {
                applyMaskingToModal(modal);
            }, 100);
        }

        return id;
    }

    // ============================================================
    // PUBLIC: Toast Wrapper
    // ============================================================

    var toastWrapper = {
        success: function(msg, opts) {
            opts = opts || {};
            opts.type = 'success';
            if (typeof toast !== 'undefined' && toast.success) {
                return toast.success(msg, opts);
            }
            console.log('[toast:success]', msg);
        },
        error: function(msg, opts) {
            opts = opts || {};
            opts.type = 'error';
            if (typeof toast !== 'undefined' && toast.error) {
                return toast.error(msg, opts);
            }
            console.log('[toast:error]', msg);
        },
        info: function(msg, opts) {
            opts = opts || {};
            opts.type = 'info';
            if (typeof toast !== 'undefined' && toast.info) {
                return toast.info(msg, opts);
            }
            console.log('[toast:info]', msg);
        },
        warning: function(msg, opts) {
            opts = opts || {};
            opts.type = 'warning';
            if (typeof toast !== 'undefined' && toast.warning) {
                return toast.warning(msg, opts);
            }
            console.log('[toast:warning]', msg);
        },
        dismiss: function(id) {
            if (typeof toast !== 'undefined' && toast.dismiss) {
                toast.dismiss(id);
            }
        },
        dismissAll: function() {
            if (typeof toast !== 'undefined' && toast.dismissAll) {
                toast.dismissAll();
            }
        }
    };

    // ============================================================
    // INTERNAL: Setup Event Handlers (runs on first call)
    // ============================================================

    var initialized = false;

    function init() {
        if (initialized) return;
        initialized = true;

        // ESC key handler - close all open modals
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                var modals = document.querySelectorAll('.fixed.inset-0');
                for (var i = 0; i < modals.length; i++) {
                    if (!modals[i].classList.contains('hidden')) {
                        close(modals[i].id);
                    }
                }
            }
        });

        // Backdrop click handler for all modals (delegated)
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('fixed') && e.target.classList.contains('inset-0')) {
                var modals = document.querySelectorAll('.fixed.inset-0');
                for (var i = 0; i < modals.length; i++) {
                    if (modals[i] === e.target && !modals[i].classList.contains('hidden')) {
                        close(modals[i].id);
                        break;
                    }
                }
            }
        });

        // Listen for Ctrl+Shift+M - delegate to data-mask.php
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.shiftKey && e.key === 'M') {
                e.preventDefault();
                if (typeof window.toggleDataMask !== 'undefined') {
                    window.toggleDataMask();
                } else {
                    toggleMasking();
                }
            }
        });
    }

    // ============================================================
    // INTERNAL: Helpers
    // ============================================================

    function escapeHtml(str) {
        if (!str) return '';
        var div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    // ============================================================
    // INIT
    // ============================================================

    init();

    // ============================================================
    // PUBLIC API
    // ============================================================

    return {
        // Core modal functions
        open: open,
        close: close,
        isAnyOpen: isAnyOpen,
        confirm: confirm,
        createModal: createModal,
        
        // Data masking functions
        toggleMasking: toggleMasking,
        isMasked: isMasked,
        refreshMasking: refreshMasking,
        applyMaskingToModal: applyMaskingToModal,
        
        // Toast wrapper
        toast: toastWrapper
    };
})();

// ============================================================
// GLOBAL KEYBOARD SHORTCUT: Ctrl+Shift+M
// ============================================================

console.log('✅ ModalSystem loaded with data masking support.');
console.log('📌 Press Ctrl+Shift+M to toggle data masking.');