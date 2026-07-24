<?php
/**
 * Data Masking System - Reusable across entire application
 * 
 * USAGE:
 * 1. Include this file: <?php include_once 'includes/data-mask.php'; ?>
 * 2. Add class="maskable" data-masked="Masked Value" to any element
 * 3. Press Ctrl+Shift+M to toggle masking
 * 4. Use PHP helpers: maskName(), maskId(), maskableHTML(), maskableInput()
 */

// ============================================================
// PHP HELPER FUNCTIONS
// ============================================================

/**
 * PHP Helper: Mask a name
 * Usage: <?php echo maskName('Juan Dela Cruz'); ?>
 */
function maskName($name, $visibleChars = 1) {
    if (empty($name)) return '';
    $parts = explode(' ', $name);
    $masked = array_map(function($p) use ($visibleChars) {
        if (empty($p)) return '';
        if (strlen($p) <= $visibleChars) return $p;
        return substr($p, 0, $visibleChars) . str_repeat('*', strlen($p) - $visibleChars);
    }, $parts);
    return implode(' ', $masked);
}

/**
 * PHP Helper: Mask an ID
 * Usage: <?php echo maskId('P-12345'); ?>
 */
function maskId($id, $visibleChars = 2) {
    if (empty($id)) return '';
    if (strlen($id) <= $visibleChars) return $id;
    return substr($id, 0, $visibleChars) . str_repeat('*', strlen($id) - $visibleChars);
}

/**
 * PHP Helper: Generate maskable HTML
 * Usage: <?php echo maskableHTML('Juan Dela Cruz', maskName('Juan Dela Cruz')); ?>
 */
function maskableHTML($real, $masked, $tag = 'span', $extraClasses = '') {
    return "<{$tag} class=\"maskable {$extraClasses}\" data-masked=\"" . htmlspecialchars($masked) . "\" data-real=\"" . htmlspecialchars($real) . "\">" . htmlspecialchars($masked) . "</{$tag}>";
}

/**
 * PHP Helper: Generate maskable input HTML
 * Usage: <?php echo maskableInput('Juan Dela Cruz', maskName('Juan Dela Cruz')); ?>
 */
function maskableInput($real, $masked, $id = '', $extraClasses = '') {
    $idAttr = $id ? "id=\"{$id}\"" : '';
    return "<input type=\"text\" {$idAttr} class=\"maskable input-maskable {$extraClasses}\" data-masked=\"" . htmlspecialchars($masked) . "\" data-real=\"" . htmlspecialchars($real) . "\" value=\"" . htmlspecialchars($masked) . "\" readonly>";
}
?>
<style>
/* ============================================================
   DATA MASKING SYSTEM - REUSABLE
   ============================================================ */

/* Base maskable element */
.maskable {
    transition: all 0.2s ease;
    position: relative;
}

/* ============================================================
   TEXT ELEMENTS (span, p, h1-h6, div, td, etc.)
   ============================================================ */

/* Masked state - hide real content, show masked content via ::after */
.maskable.masked {
    color: transparent !important;
    background: transparent !important;
    user-select: none;
    -webkit-user-select: none;
    text-shadow: none !important;
}

.maskable.masked * {
    color: transparent !important;
}

/* Show masked content as pseudo-element for text elements */
.maskable.masked::after {
    content: attr(data-masked);
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    color: #475569;
    font-weight: 600;
    white-space: nowrap;
    letter-spacing: 0.5px;
    font-size: inherit;
    font-family: inherit;
}

/* For table cell masking */
td .maskable.masked::after {
    top: 50%;
    transform: translateY(-50%);
}

/* ============================================================
   INPUT FIELDS (input, textarea, select)
   ============================================================ */

/* Input field wrapper - required for absolute positioning */
.maskable-wrapper {
    position: relative;
}

/* Input fields in masked state */
.maskable.masked.input-maskable {
    color: transparent !important;
    background: #f1f5f9 !important;
    caret-color: transparent;
}

/* Show masked text as overlay on input via ::after */
.maskable.masked.input-maskable::after {
    content: attr(data-masked) !important;
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #1e293b !important;
    font-weight: 600;
    white-space: nowrap;
    letter-spacing: 0.5px;
    font-size: 14px;
    font-family: inherit;
    pointer-events: none;
    background: transparent;
    z-index: 10;
    width: calc(100% - 24px);
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Alternative: Span overlay for inputs (more reliable) */
.maskable-overlay {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #1e293b;
    font-weight: 600;
    font-size: 14px;
    pointer-events: none;
    z-index: 5;
    width: calc(100% - 24px);
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    display: none;
}

/* Show overlay when parent is masked */
.maskable-wrapper.masked .maskable-overlay {
    display: block;
}

/* Hide input value when masked */
.maskable-wrapper.masked .maskable-input {
    color: transparent !important;
    background: #f1f5f9 !important;
}

/* ============================================================
   TOGGLE BUTTON
   ============================================================ */

#dataMaskToggle {
    cursor: pointer;
    padding: 6px 12px;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
    background: white;
    font-size: 12px;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}

#dataMaskToggle:hover {
    background: #f1f5f9;
    border-color: #cbd5e1;
}

#dataMaskToggle .mask-icon {
    display: inline-block;
    transition: transform 0.2s ease;
}

#dataMaskToggle:hover .mask-icon {
    transform: scale(1.1);
}

/* ============================================================
   TOAST NOTIFICATION
   ============================================================ */

.mask-toast {
    position: fixed;
    bottom: 20px;
    right: 20px;
    padding: 10px 20px;
    border-radius: 10px;
    background: #0f172a;
    color: white;
    font-size: 13px;
    font-weight: 500;
    z-index: 9999;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.3s ease;
    pointer-events: none;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
}

.mask-toast.show {
    opacity: 1;
    transform: translateY(0);
}
</style>

<script>
// ============================================================
// SINGLE SOURCE OF TRUTH - DATA MASKING SYSTEM
// ============================================================
(function() {
    'use strict';

    const STORAGE_KEY = 'data_masking_enabled';
    let isMasked = localStorage.getItem(STORAGE_KEY);
    let isApplying = false;
    
    // Default to masked (true) if not set - HIDDEN BY DEFAULT
    if (isMasked === null) isMasked = true;
    else isMasked = isMasked === 'true';

    /**
     * Apply masking state to all elements with class 'maskable'
     */
    function applyMasking() {
        if (isApplying) return;
        isApplying = true;
        
        try {
            // ============================================================
            // DIRECT TABLE HANDLING - Force update all appointment rows
            // ============================================================
            document.querySelectorAll('.appointment-row').forEach(row => {
                row.querySelectorAll('.maskable').forEach(el => {
                    if (isMasked) {
                        el.classList.add('masked');
                        if (el.tagName === 'INPUT') {
                            el.classList.add('input-maskable');
                            el.style.color = 'transparent';
                        }
                        if (el.dataset.masked && el.dataset.masked !== '') {
                            el.textContent = el.dataset.masked;
                        } else if (el.dataset.real) {
                            const realText = el.dataset.real;
                            const maskedText = realText.split(' ').map(p => {
                                if (!p) return '';
                                return p.charAt(0).toUpperCase() + '*'.repeat(Math.max(0, p.length - 1));
                            }).join(' ');
                            el.textContent = maskedText;
                            el.dataset.masked = maskedText;
                        }
                    } else {
                        el.classList.remove('masked');
                        el.classList.remove('input-maskable');
                        el.style.color = '';
                        if (el.dataset.real) {
                            el.textContent = el.dataset.real;
                        }
                    }
                });
            });

            // ============================================================
            // HANDLE ALL OTHER MASKABLE ELEMENTS (modals, etc.)
            // ============================================================
            document.querySelectorAll('.maskable:not(.appointment-row .maskable)').forEach(el => {
                if (isMasked) {
                    el.classList.add('masked');
                    if (el.tagName === 'INPUT') {
                        el.classList.add('input-maskable');
                        el.style.color = 'transparent';
                    }
                    if (el.tagName !== 'INPUT' && el.dataset.masked) {
                        el.textContent = el.dataset.masked;
                    } else if (el.tagName !== 'INPUT' && el.dataset.real) {
                        const realText = el.dataset.real;
                        const maskedText = realText.split(' ').map(p => {
                            if (!p) return '';
                            return p.charAt(0).toUpperCase() + '*'.repeat(Math.max(0, p.length - 1));
                        }).join(' ');
                        el.textContent = maskedText;
                        el.dataset.masked = maskedText;
                    }
                } else {
                    el.classList.remove('masked');
                    el.classList.remove('input-maskable');
                    el.style.color = '';
                    if (el.tagName !== 'INPUT' && el.dataset.real) {
                        el.textContent = el.dataset.real;
                    }
                    if (el.tagName === 'INPUT' && el.dataset.real) {
                        el.value = el.dataset.real;
                    }
                }
            });

            // ============================================================
            // HANDLE EDIT PATIENT FIELD
            // ============================================================
            const editPatientInput = document.getElementById('edit_patient_name');
            const maskedSpan = document.getElementById('edit_patient_masked_display');
            
            if (editPatientInput && maskedSpan) {
                if (isMasked) {
                    editPatientInput.style.color = 'transparent';
                    editPatientInput.style.background = '#f1f5f9';
                    maskedSpan.style.display = 'block';
                } else {
                    editPatientInput.style.color = '';
                    editPatientInput.style.background = '#f1f5f9';
                    if (editPatientInput.dataset.real) {
                        editPatientInput.value = editPatientInput.dataset.real;
                    }
                    maskedSpan.style.display = 'none';
                }
            }

            // ============================================================
            // HANDLE ADD PATIENT SEARCH
            // ============================================================
            const addPatientSearch = document.getElementById('add_patient_search');
            if (addPatientSearch && addPatientSearch.dataset.masked) {
                if (isMasked) {
                    addPatientSearch.value = addPatientSearch.dataset.masked;
                    addPatientSearch.style.color = 'transparent';
                    addPatientSearch.style.background = '#f1f5f9';
                } else {
                    addPatientSearch.value = addPatientSearch.dataset.real;
                    addPatientSearch.style.color = '';
                    addPatientSearch.style.background = '';
                }
            }

            // ============================================================
            // UPDATE TOGGLE BUTTON
            // ============================================================
            const btn = document.getElementById('dataMaskToggle');
            if (btn) {
                const iconClass = isMasked ? 'fa-eye-slash' : 'fa-eye';
                const labelText = isMasked ? 'Hidden' : 'Visible';
                
                btn.innerHTML = `
                    <i class="fa-solid ${iconClass} text-sm mask-icon" aria-hidden="true"></i>
                    <span class="hidden sm:inline ml-1.5">${labelText}</span>
                `;
                btn.title = isMasked ? 'Click to show real data' : 'Click to hide real data';
            }
        } finally {
            isApplying = false;
        }
    }

    /**
     * Show toast notification using the global toast system
     */
    function showMaskToast(message) {
        if (typeof toast !== 'undefined' && typeof toast.info === 'function') {
            toast.info(message, { 
                title: 'Data Masking',
                duration: 3000 
            });
            return;
        }
        
        let toastEl = document.getElementById('maskToast');
        if (!toastEl) {
            toastEl = document.createElement('div');
            toastEl.id = 'maskToast';
            toastEl.className = 'mask-toast';
            document.body.appendChild(toastEl);
        }
        toastEl.textContent = message;
        toastEl.classList.add('show');
        clearTimeout(toastEl._hideTimer);
        toastEl._hideTimer = setTimeout(() => {
            toastEl.classList.remove('show');
        }, 3000);
    }

    /**
     * Toggle masking state (exposed globally)
     */
    window.toggleDataMask = function() {
        isMasked = !isMasked;
        localStorage.setItem(STORAGE_KEY, isMasked);
        applyMasking();
        
        const message = isMasked ? 'Data hidden' : 'Data visible';
        showMaskToast(message);
    };

    /**
     * Get current masking state
     */
    window.isDataMasked = function() {
        return isMasked;
    };

    /**
     * Set masking state programmatically
     */
    window.setDataMask = function(state) {
        isMasked = state;
        localStorage.setItem(STORAGE_KEY, isMasked);
        applyMasking();
    };

    /**
     * Apply masking to specific container
     */
    window.applyMaskingToContainer = function(container) {
        if (isApplying) return;
        isApplying = true;
        
        try {
            const elements = container ? container.querySelectorAll('.maskable') : document.querySelectorAll('.maskable');
            elements.forEach(el => {
                if (isMasked) {
                    el.classList.add('masked');
                    if (el.tagName === 'INPUT') {
                        el.classList.add('input-maskable');
                        el.style.color = 'transparent';
                    }
                    if (el.tagName !== 'INPUT' && el.dataset.masked) {
                        el.textContent = el.dataset.masked;
                    }
                    const wrapper = el.closest('.maskable-wrapper');
                    if (wrapper) {
                        wrapper.classList.add('masked');
                    }
                } else {
                    el.classList.remove('masked');
                    el.classList.remove('input-maskable');
                    el.style.color = '';
                    if (el.tagName === 'INPUT' && el.dataset.real) {
                        el.value = el.dataset.real;
                    }
                    if (el.tagName !== 'INPUT' && el.dataset.real) {
                        el.textContent = el.dataset.real;
                    }
                    const wrapper = el.closest('.maskable-wrapper');
                    if (wrapper) {
                        wrapper.classList.remove('masked');
                    }
                }
            });
        } finally {
            isApplying = false;
        }
    };


    // ============================================================
    // AUTO-APPLY ON PAGE LOAD
    // ============================================================

    document.addEventListener('DOMContentLoaded', applyMasking);

    // ============================================================
    // WATCH FOR DYNAMIC CONTENT (modals, AJAX)
    // ============================================================

    let observerTimeout = null;
    const observer = new MutationObserver(function(mutations) {
        if (isApplying) return;
        
        let shouldApply = false;
        let newMaskableElements = [];
        
        for (let i = 0; i < mutations.length; i++) {
            const mutation = mutations[i];
            if (mutation.addedNodes.length > 0) {
                for (let j = 0; j < mutation.addedNodes.length; j++) {
                    const node = mutation.addedNodes[j];
                    if (node.nodeType === 1) {
                        if (node.classList && node.classList.contains('maskable')) {
                            shouldApply = true;
                            newMaskableElements.push(node);
                        }
                        if (node.querySelectorAll) {
                            const found = node.querySelectorAll('.maskable');
                            if (found.length > 0) {
                                shouldApply = true;
                                found.forEach(el => newMaskableElements.push(el));
                            }
                        }
                    }
                }
            }
        }
        
        if (shouldApply && newMaskableElements.length > 0) {
            clearTimeout(observerTimeout);
            observerTimeout = setTimeout(function() {
                newMaskableElements.forEach(el => {
                    if (isMasked) {
                        el.classList.add('masked');
                        if (el.tagName === 'INPUT') {
                            el.classList.add('input-maskable');
                            el.style.color = 'transparent';
                        }
                        if (el.tagName !== 'INPUT' && el.dataset.masked) {
                            el.textContent = el.dataset.masked;
                        } else if (el.tagName !== 'INPUT' && el.dataset.real) {
                            const realText = el.dataset.real;
                            const maskedText = realText.split(' ').map(p => {
                                if (!p) return '';
                                return p.charAt(0).toUpperCase() + '*'.repeat(Math.max(0, p.length - 1));
                            }).join(' ');
                            el.textContent = maskedText;
                            el.dataset.masked = maskedText;
                        }
                        const wrapper = el.closest('.maskable-wrapper');
                        if (wrapper) {
                            wrapper.classList.add('masked');
                        }
                    } else {
                        el.classList.remove('masked');
                        el.classList.remove('input-maskable');
                        el.style.color = '';
                        if (el.tagName === 'INPUT' && el.dataset.real) {
                            el.value = el.dataset.real;
                        }
                        if (el.tagName !== 'INPUT' && el.dataset.real) {
                            el.textContent = el.dataset.real;
                        }
                        const wrapper = el.closest('.maskable-wrapper');
                        if (wrapper) {
                            wrapper.classList.remove('masked');
                        }
                    }
                });
                
                // Handle add patient search field
                const addSearch = document.getElementById('add_patient_search');
                if (addSearch && addSearch.dataset.masked) {
                    if (isMasked) {
                        addSearch.value = addSearch.dataset.masked;
                        addSearch.style.color = 'transparent';
                        addSearch.style.background = '#f1f5f9';
                    } else {
                        addSearch.value = addSearch.dataset.real;
                        addSearch.style.color = '';
                        addSearch.style.background = '';
                    }
                }
                
                // Handle dropdown items
                const dropdown = document.getElementById('add_patient_dropdown');
                if (dropdown) {
                    const items = dropdown.querySelectorAll('.maskable');
                    items.forEach(item => {
                        if (isMasked) {
                            item.classList.add('masked');
                            if (item.dataset.masked) {
                                item.textContent = item.dataset.masked;
                            }
                        } else {
                            item.classList.remove('masked');
                            if (item.dataset.real) {
                                item.textContent = item.dataset.real;
                            }
                        }
                    });
                }
                
            }, 150);
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    });

    console.log('✅ Data Masking System loaded.');
    console.log('📌 Press Ctrl+Shift+M to toggle masking.');
    console.log('📌 Default state: HIDDEN (masked)');

})();
</script>