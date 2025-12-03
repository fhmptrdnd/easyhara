import pygame
import cairo
import random
import math
import sys

# --- KONSTANTA GAME ---
SCREEN_WIDTH = 800
SCREEN_HEIGHT = 600
FPS = 60
MAX_LEVEL = 5
SCORE_PENALTY = 2 # Konstanta untuk pengurangan skor

# Grid System
GRID_COLS = 40 
GRID_ROWS = 30
SLOT_SIZE = 20 
TOTAL_SLOTS = GRID_COLS * GRID_ROWS

# --- DEFINISI HELPER FUNCTION ---
def make_vertical_line(col, start_row, end_row):
    """Helper untuk membuat garis vertikal (menggunakan GRID_COLS=40 implisit)"""
    return [row * GRID_COLS + col for row in range(start_row, end_row + 1)]

def make_horizontal_line(row, start_col, end_col):
    """Helper untuk membuat garis horizontal (menggunakan GRID_COLS=40 implisit)"""
    return [row * GRID_COLS + col for col in range(start_col, end_col + 1)]

# Fungsi untuk membuat warna lebih gelap dengan faktor tertentu
# Menurunkan semua komponen RGB
def darken_rgb(color_tuple, factor=0.5):
    return (max(0.0, color_tuple[0] * factor), 
            max(0.0, color_tuple[1] * factor), 
            max(0.0, color_tuple[2] * factor))

# --- SKEMA WARNA BERDASARKAN LEVEL KESULITAN (DENGAN BG_COLORS YANG LEBIH GELAP) ---
COLOR_SCHEMES = {
    1: {
        # Warna dot latar belakang
        'BG_COLORS': [(0.1, 0.4, 0.1), (0.2, 0.5, 0.2), (0.15, 0.45, 0.15)],
        # Warna dot angka
        'FG_COLORS': [(0.7, 0.1, 0.1), (0.8, 0.2, 0.2), (0.75, 0.15, 0.15)],
        'SCORE_WEIGHT': 1,
        # Warna latar belakang window/canvas utama, jauh lebih gelap
        'WINDOW_BG_COLOR': (0.05, 0.15, 0.05), # Sangat gelap
    },
    2: {
        'BG_COLORS': [(0.3, 0.5, 0.2), (0.35, 0.55, 0.25), (0.25, 0.45, 0.18)],
        'FG_COLORS': [(0.6, 0.4, 0.3), (0.65, 0.45, 0.35), (0.55, 0.35, 0.25)],
        'SCORE_WEIGHT': 2,
        'WINDOW_BG_COLOR': (0.15, 0.25, 0.1), # Lebih gelap
    },
    3: {
        'BG_COLORS': [(0.4, 0.45, 0.25), (0.45, 0.5, 0.3), (0.35, 0.4, 0.2)],
        'FG_COLORS': [(0.5, 0.35, 0.35), (0.55, 0.4, 0.4), (0.45, 0.3, 0.3)],
        'SCORE_WEIGHT': 3,
        'WINDOW_BG_COLOR': (0.2, 0.25, 0.15), # Agak gelap
    },
    4: {
        'BG_COLORS': [(0.45, 0.45, 0.3), (0.5, 0.5, 0.35), (0.4, 0.4, 0.25)],
        'FG_COLORS': [(0.55, 0.45, 0.4), (0.6, 0.5, 0.45), (0.5, 0.4, 0.35)],
        'SCORE_WEIGHT': 4,
        'WINDOW_BG_COLOR': (0.25, 0.25, 0.18), # Sedikit gelap
    },
    5: {
        'BG_COLORS': [(0.5, 0.5, 0.4), (0.55, 0.55, 0.45), (0.45, 0.45, 0.35)],
        'FG_COLORS': [(0.6, 0.5, 0.5), (0.65, 0.55, 0.55), (0.55, 0.45, 0.45)],
        'SCORE_WEIGHT': 5,
        'WINDOW_BG_COLOR': (0.3, 0.3, 0.25), # Paling terang di antara yang gelap
    }
}

# --- NUMBER_TEMPLATES (TIDAK BERUBAH) ---
NUMBER_TEMPLATES = {
    '12': [
        # Angka "1"
        *make_vertical_line(15, 9, 22), *make_vertical_line(16, 9, 22), 
        8*40+14, 9*40+14, *make_horizontal_line(22, 13, 17),
        # Angka "2"
        *make_horizontal_line(8, 22, 26), *make_horizontal_line(9, 21, 27),
        *make_vertical_line(26, 10, 12), *make_vertical_line(27, 10, 12),
        13*40+26, 13*40+27, 14*40+25, 14*40+26, 15*40+24, 15*40+25,
        16*40+23, 16*40+24, 17*40+22, 17*40+23, 18*40+21, 18*40+22,
        *make_horizontal_line(19, 20, 27), *make_horizontal_line(20, 20, 27),
    ],
    
   
    '8': [
        *make_horizontal_line(8, 18, 22), *make_horizontal_line(9, 17, 23),
        *make_vertical_line(17, 10, 13), *make_vertical_line(23, 10, 13),
        *make_horizontal_line(14, 18, 22), *make_horizontal_line(15, 17, 23),
        *make_vertical_line(17, 16, 20), *make_vertical_line(23, 16, 20),
        *make_horizontal_line(21, 18, 22), *make_horizontal_line(22, 17, 23),
    ],
    
    '3': [
        *make_horizontal_line(8, 17, 23), *make_horizontal_line(9, 17, 23),
        *make_vertical_line(22, 10, 13), *make_vertical_line(23, 10, 13),
        *make_horizontal_line(14, 18, 23), *make_horizontal_line(15, 18, 23),
        *make_vertical_line(22, 16, 20), *make_vertical_line(23, 16, 20),
        *make_horizontal_line(21, 17, 23), *make_horizontal_line(22, 17, 23),
    ],
    
    '6': [
        *make_horizontal_line(8, 18, 22), *make_horizontal_line(9, 17, 23),
        *make_vertical_line(17, 10, 20), *make_vertical_line(18, 10, 20),
        *make_horizontal_line(14, 18, 22), *make_horizontal_line(15, 18, 22),
        *make_vertical_line(22, 16, 20), *make_vertical_line(23, 16, 20),
        *make_horizontal_line(21, 18, 22), *make_horizontal_line(22, 18, 22),
    ],
    
    '5': [
        *make_horizontal_line(8, 17, 23), *make_horizontal_line(9, 17, 23),
        *make_vertical_line(17, 10, 14), *make_vertical_line(18, 10, 14),
        *make_horizontal_line(14, 17, 23), *make_horizontal_line(15, 17, 23),
        *make_vertical_line(22, 16, 20), *make_vertical_line(23, 16, 20),
        *make_horizontal_line(21, 17, 23), *make_horizontal_line(22, 17, 23),
    ],
    
    '29': [
        # Angka "2"
        *make_horizontal_line(8, 13, 17), *make_horizontal_line(9, 12, 18),
        *make_vertical_line(17, 10, 12), *make_vertical_line(18, 10, 12),
        13*40+17, 13*40+18, 14*40+16, 14*40+17, 15*40+15, 15*40+16,
        16*40+14, 16*40+15, 17*40+13, 17*40+14, 18*40+12, 18*40+13,
        *make_horizontal_line(19, 11, 18), *make_horizontal_line(20, 11, 18),
        # Angka "9"
        *make_horizontal_line(8, 22, 26), *make_horizontal_line(9, 21, 27),
        *make_vertical_line(21, 10, 14), *make_vertical_line(22, 10, 14),
        *make_vertical_line(26, 10, 20), *make_vertical_line(27, 10, 20),
        *make_horizontal_line(14, 22, 26), *make_horizontal_line(15, 22, 27),
        *make_horizontal_line(21, 22, 26), *make_horizontal_line(22, 21, 27),
    ],
    
    '70': [
        # Angka "7"
        *make_horizontal_line(8, 13, 19), *make_horizontal_line(9, 13, 19),
        *make_horizontal_line(10, 13, 19), 11*40+18, 11*40+19, 12*40+18, 12*40+19,
        13*40+17, 13*40+18, 14*40+17, 14*40+18, 15*40+16, 15*40+17,
        16*40+16, 16*40+17, 17*40+15, 17*40+16, *make_vertical_line(15, 18, 22),
        *make_vertical_line(16, 18, 22),
        # Angka "0"
        *make_horizontal_line(8, 22, 26), *make_horizontal_line(9, 21, 27),
        *make_horizontal_line(22, 22, 26), *make_horizontal_line(21, 21, 27),
        *make_vertical_line(21, 10, 20), *make_vertical_line(22, 10, 20),
        *make_vertical_line(26, 10, 20), *make_vertical_line(27, 10, 20),
    ],
    
    '57': [
        # Angka "5"
        *make_horizontal_line(8, 13, 19), *make_horizontal_line(9, 13, 19),
        *make_vertical_line(13, 10, 14), *make_vertical_line(14, 10, 14),
        *make_horizontal_line(14, 13, 19), *make_horizontal_line(15, 13, 19),
        *make_vertical_line(18, 16, 20), *make_vertical_line(19, 16, 20),
        *make_horizontal_line(21, 13, 19), *make_horizontal_line(22, 13, 19),
        # Angka "7"
        *make_horizontal_line(8, 21, 27), *make_horizontal_line(9, 21, 27),
        *make_horizontal_line(10, 21, 27), 11*40+26, 11*40+27, 12*40+26, 12*40+27,
        13*40+25, 13*40+26, 14*40+25, 14*40+26, 15*40+24, 15*40+25,
        16*40+24, 16*40+25, 17*40+23, 17*40+24, *make_vertical_line(23, 18, 22),
        *make_vertical_line(24, 18, 22),
    ],
    
    '35': [
        # Angka "3"
        *make_horizontal_line(8, 13, 19), *make_horizontal_line(9, 13, 19),
        *make_vertical_line(18, 10, 13), *make_vertical_line(19, 10, 13),
        *make_horizontal_line(14, 14, 19), *make_horizontal_line(15, 14, 19),
        *make_vertical_line(18, 16, 20), *make_vertical_line(19, 16, 20),
        *make_horizontal_line(21, 13, 19), *make_horizontal_line(22, 13, 19),
        # Angka "5"
        *make_horizontal_line(8, 21, 27), *make_horizontal_line(9, 21, 27),
        *make_vertical_line(21, 10, 14), *make_vertical_line(22, 10, 14),
        *make_horizontal_line(14, 21, 27), *make_horizontal_line(15, 21, 27),
        *make_vertical_line(26, 16, 20), *make_vertical_line(27, 16, 20),
        *make_horizontal_line(21, 21, 27), *make_horizontal_line(22, 21, 27),
    ],
    
    '2': [
        *make_horizontal_line(8, 18, 22), *make_horizontal_line(9, 17, 23),
        *make_vertical_line(22, 10, 12), *make_vertical_line(23, 10, 12),
        13*40+22, 13*40+23, 14*40+21, 14*40+22, 15*40+20, 15*40+21,
        16*40+19, 16*40+20, 17*40+18, 17*40+19, 18*40+17, 18*40+18,
        *make_horizontal_line(19, 15, 23), *make_horizontal_line(20, 15, 23),
    ],
    
    '15': [
        # Angka "1"
        *make_vertical_line(15, 9, 22), *make_vertical_line(16, 9, 22),
        8*40+14, 9*40+14, *make_horizontal_line(22, 13, 17),
        # Angka "5"
        *make_horizontal_line(8, 21, 27), *make_horizontal_line(9, 21, 27),
        *make_vertical_line(21, 10, 14), *make_vertical_line(22, 10, 14),
        *make_horizontal_line(14, 21, 27), *make_horizontal_line(15, 21, 27),
        *make_vertical_line(26, 16, 20), *make_vertical_line(27, 16, 20),
        *make_horizontal_line(21, 21, 27), *make_horizontal_line(22, 21, 27),
    ],
    
    '17': [
        # Angka "1"
        *make_vertical_line(15, 9, 22), *make_vertical_line(16, 9, 22),
        8*40+14, 9*40+14, *make_horizontal_line(22, 13, 17),
        # Angka "7"
        *make_horizontal_line(8, 21, 27), *make_horizontal_line(9, 21, 27),
        *make_horizontal_line(10, 21, 27), 11*40+26, 11*40+27, 12*40+26, 12*40+27,
        13*40+25, 13*40+26, 14*40+25, 14*40+26, 15*40+24, 15*40+25,
        16*40+24, 16*40+25, 17*40+23, 17*40+24, *make_vertical_line(23, 18, 22),
        *make_vertical_line(24, 18, 22),
    ],
    
    '74': [
        # Angka "7"
        *make_horizontal_line(8, 13, 19), *make_horizontal_line(9, 13, 19),
        *make_horizontal_line(10, 13, 19), 11*40+18, 11*40+19, 12*40+18, 12*40+19,
        13*40+17, 13*40+18, 14*40+17, 14*40+18, 15*40+16, 15*40+17,
        16*40+16, 16*40+17, 17*40+15, 17*40+16, *make_vertical_line(15, 18, 22),
        *make_vertical_line(16, 18, 22),
        # Angka "4"
        *make_vertical_line(21, 8, 15), *make_vertical_line(22, 8, 15),
        *make_horizontal_line(15, 21, 27), *make_horizontal_line(16, 21, 27),
        *make_vertical_line(25, 8, 22), *make_vertical_line(26, 8, 22),
    ],
    
    '21': [
        # Angka "2"
        *make_horizontal_line(8, 13, 17), *make_horizontal_line(9, 12, 18),
        *make_vertical_line(17, 10, 12), *make_vertical_line(18, 10, 12),
        13*40+17, 13*40+18, 14*40+16, 14*40+17, 15*40+15, 15*40+16,
        16*40+14, 16*40+15, 17*40+13, 17*40+14, 18*40+12, 18*40+13,
        *make_horizontal_line(19, 11, 18), *make_horizontal_line(20, 11, 18),
        # Angka "1"
        *make_vertical_line(23, 9, 22), *make_vertical_line(24, 9, 22),
        8*40+22, 9*40+22, *make_horizontal_line(22, 21, 25),
    ],
    
    # PLATES 10-13 - VANISHING DESIGN (Hanya terlihat orang normal)
    '16': [
        # Angka "1"
        *make_vertical_line(15, 9, 22), *make_vertical_line(16, 9, 22),
        8*40+14, 9*40+14, *make_horizontal_line(22, 13, 17),
        # Angka "6"
        *make_horizontal_line(8, 22, 26), *make_horizontal_line(9, 21, 27),
        *make_vertical_line(21, 10, 20), *make_vertical_line(22, 10, 20),
        *make_horizontal_line(14, 22, 26), *make_horizontal_line(15, 22, 26),
        *make_vertical_line(26, 16, 20), *make_vertical_line(27, 16, 20),
        *make_horizontal_line(21, 22, 26), *make_horizontal_line(22, 22, 26),
    ],
    
    '73': [
        # Angka "7"
        *make_horizontal_line(8, 13, 19), *make_horizontal_line(9, 13, 19),
        *make_horizontal_line(10, 13, 19), 11*40+18, 11*40+19, 12*40+18, 12*40+19,
        13*40+17, 13*40+18, 14*40+17, 14*40+18, 15*40+16, 15*40+17,
        16*40+16, 16*40+17, 17*40+15, 17*40+16, *make_vertical_line(15, 18, 22),
        *make_vertical_line(16, 18, 22),
        # Angka "3"
        *make_horizontal_line(8, 21, 27), *make_horizontal_line(9, 21, 27),
        *make_vertical_line(26, 10, 13), *make_vertical_line(27, 10, 13),
        *make_horizontal_line(14, 22, 27), *make_horizontal_line(15, 22, 27),
        *make_vertical_line(26, 16, 20), *make_vertical_line(27, 16, 20),
        *make_horizontal_line(21, 21, 27), *make_horizontal_line(22, 21, 27),
    ],
    
    # HIDDEN DIGIT PLATES (Hanya terlihat orang buta warna)
    '45': [
        # Angka "4"
        *make_vertical_line(13, 8, 15), *make_vertical_line(14, 8, 15),
        *make_horizontal_line(15, 13, 19), *make_horizontal_line(16, 13, 19),
        *make_vertical_line(17, 8, 22), *make_vertical_line(18, 8, 22),
        # Angka "5"
        *make_horizontal_line(8, 21, 27), *make_horizontal_line(9, 21, 27),
        *make_vertical_line(21, 10, 14), *make_vertical_line(22, 10, 14),
        *make_horizontal_line(14, 21, 27), *make_horizontal_line(15, 21, 27),
        *make_vertical_line(26, 16, 20), *make_vertical_line(27, 16, 20),
        *make_horizontal_line(21, 21, 27), *make_horizontal_line(22, 21, 27),
    ],
    
    # ANGKA TAMBAHAN YANG SERING DIGUNAKAN
    '0': [
        *make_horizontal_line(8, 18, 22), *make_horizontal_line(9, 17, 23),
        *make_horizontal_line(22, 18, 22), *make_horizontal_line(21, 17, 23),
        *make_vertical_line(17, 10, 20), *make_vertical_line(18, 10, 20),
        *make_vertical_line(22, 10, 20), *make_vertical_line(23, 10, 20),
    ],
    
    '1': [
        *make_vertical_line(19, 9, 22), *make_vertical_line(20, 9, 22),
        *make_vertical_line(21, 9, 22), 8*40+18, 8*40+19, 9*40+18,
        *make_horizontal_line(22, 17, 23),
    ],
    
    '4': [
        *make_vertical_line(17, 8, 15), *make_vertical_line(18, 8, 15),
        *make_horizontal_line(15, 17, 23), *make_horizontal_line(16, 17, 23),
        *make_vertical_line(21, 8, 22), *make_vertical_line(22, 8, 22),
    ],
    
    '7': [
        *make_horizontal_line(8, 17, 23), *make_horizontal_line(9, 17, 23),
        *make_horizontal_line(10, 17, 23), 11*40+22, 11*40+23, 12*40+22, 12*40+23,
        13*40+21, 13*40+22, 14*40+21, 14*40+22, 15*40+20, 15*40+21,
        16*40+20, 16*40+21, 17*40+19, 17*40+20, *make_vertical_line(19, 18, 22),
        *make_vertical_line(20, 18, 22),
    ],
    
    '9': [
        *make_horizontal_line(8, 18, 22), *make_horizontal_line(9, 17, 23),
        *make_vertical_line(17, 10, 14), *make_vertical_line(18, 10, 14),
        *make_vertical_line(22, 10, 20), *make_vertical_line(23, 10, 20),
        *make_horizontal_line(14, 18, 22), *make_horizontal_line(15, 18, 23),
        *make_horizontal_line(21, 18, 22), *make_horizontal_line(22, 17, 23),
    ],
    
    # ANGKA MULTI DIGIT TAMBAHAN
    '26': [
        # Angka "2"
        *make_horizontal_line(8, 13, 17), *make_horizontal_line(9, 12, 18),
        *make_vertical_line(17, 10, 12), *make_vertical_line(18, 10, 12),
        13*40+17, 13*40+18, 14*40+16, 14*40+17, 15*40+15, 15*40+16,
        16*40+14, 16*40+15, 17*40+13, 17*40+14, 18*40+12, 18*40+13,
        *make_horizontal_line(19, 11, 18), *make_horizontal_line(20, 11, 18),
        # Angka "6"
        *make_horizontal_line(8, 22, 26), *make_horizontal_line(9, 21, 27),
        *make_vertical_line(21, 10, 20), *make_vertical_line(22, 10, 20),
        *make_horizontal_line(14, 22, 26), *make_horizontal_line(15, 22, 26),
        *make_vertical_line(26, 16, 20), *make_vertical_line(27, 16, 20),
        *make_horizontal_line(21, 22, 26), *make_horizontal_line(22, 22, 26),
    ],
    
    '42': [
        # Angka "4"
        *make_vertical_line(13, 8, 15), *make_vertical_line(14, 8, 15),
        *make_horizontal_line(15, 13, 19), *make_horizontal_line(16, 13, 19),
        *make_vertical_line(17, 8, 22), *make_vertical_line(18, 8, 22),
        # Angka "2"
        *make_horizontal_line(8, 22, 26), *make_horizontal_line(9, 21, 27),
        *make_vertical_line(26, 10, 12), *make_vertical_line(27, 10, 12),
        13*40+26, 13*40+27, 14*40+25, 14*40+26, 15*40+24, 15*40+25,
        16*40+23, 16*40+24, 17*40+22, 17*40+23, 18*40+21, 18*40+22,
        *make_horizontal_line(19, 20, 27), *make_horizontal_line(20, 20, 27),
    ],
    
    '37': [
        # Angka "3"
        *make_horizontal_line(8, 13, 19), *make_horizontal_line(9, 13, 19),
        *make_vertical_line(18, 10, 13), *make_vertical_line(19, 10, 13),
        *make_horizontal_line(14, 14, 19), *make_horizontal_line(15, 14, 19),
        *make_vertical_line(18, 16, 20), *make_vertical_line(19, 16, 20),
        *make_horizontal_line(21, 13, 19), *make_horizontal_line(22, 13, 19),
        # Angka "7"
        *make_horizontal_line(8, 21, 27), *make_horizontal_line(9, 21, 27),
        *make_horizontal_line(10, 21, 27), 11*40+26, 11*40+27, 12*40+26, 12*40+27,
        13*40+25, 13*40+26, 14*40+25, 14*40+26, 15*40+24, 15*40+25,
        16*40+24, 16*40+25, 17*40+23, 17*40+24, *make_vertical_line(23, 18, 22),
        *make_vertical_line(24, 18, 22),
    ],
    
    '97': [
        # Angka "9"
        *make_horizontal_line(8, 13, 17), *make_horizontal_line(9, 12, 18),
        *make_vertical_line(12, 10, 14), *make_vertical_line(13, 10, 14),
        *make_vertical_line(17, 10, 20), *make_vertical_line(18, 10, 20),
        *make_horizontal_line(14, 13, 17), *make_horizontal_line(15, 13, 18),
        *make_horizontal_line(21, 13, 17), *make_horizontal_line(22, 12, 18),
        # Angka "7"
        *make_horizontal_line(8, 21, 27), *make_horizontal_line(9, 21, 27),
        *make_horizontal_line(10, 21, 27), 11*40+26, 11*40+27, 12*40+26, 12*40+27,
        13*40+25, 13*40+26, 14*40+25, 14*40+26, 15*40+24, 15*40+25,
        16*40+24, 16*40+25, 17*40+23, 17*40+24, *make_vertical_line(23, 18, 22),
        *make_vertical_line(24, 18, 22),
    ],
    
    '25': [
        # Angka "2"
        *make_horizontal_line(8, 13, 17), *make_horizontal_line(9, 12, 18),
        *make_vertical_line(17, 10, 12), *make_vertical_line(18, 10, 12),
        13*40+17, 13*40+18, 14*40+16, 14*40+17, 15*40+15, 15*40+16,
        16*40+14, 16*40+15, 17*40+13, 17*40+14, 18*40+12, 18*40+13,
        *make_horizontal_line(19, 11, 18), *make_horizontal_line(20, 11, 18),
        # Angka "5"
        *make_horizontal_line(8, 21, 27), *make_horizontal_line(9, 21, 27),
        *make_vertical_line(21, 10, 14), *make_vertical_line(22, 10, 14),
        *make_horizontal_line(14, 21, 27), *make_horizontal_line(15, 21, 27),
        *make_vertical_line(26, 16, 20), *make_vertical_line(27, 16, 20),
        *make_horizontal_line(21, 21, 27), *make_horizontal_line(22, 21, 27),
    ],
    
    '96': [
        # Angka "9"
        *make_horizontal_line(8, 13, 17), *make_horizontal_line(9, 12, 18),
        *make_vertical_line(12, 10, 14), *make_vertical_line(13, 10, 14),
        *make_vertical_line(17, 10, 20), *make_vertical_line(18, 10, 20),
        *make_horizontal_line(14, 13, 17), *make_horizontal_line(15, 13, 18),
        *make_horizontal_line(21, 13, 17), *make_horizontal_line(22, 12, 18),
        # Angka "6"
        *make_horizontal_line(8, 22, 26), *make_horizontal_line(9, 21, 27),
        *make_vertical_line(21, 10, 20), *make_vertical_line(22, 10, 20),
        *make_horizontal_line(14, 22, 26), *make_horizontal_line(15, 22, 26),
        *make_vertical_line(26, 16, 20), *make_vertical_line(27, 16, 20),
        *make_horizontal_line(21, 22, 26), *make_horizontal_line(22, 22, 26),
    ],
}


class IshiharaPlate:
    """Kelas untuk menghasilkan plate Ishihara dengan angka tersembunyi"""
    
    def __init__(self, hidden_number, fg_colors, bg_colors, window_bg_color, width, height):
        self.hidden_number = str(hidden_number)
        self.fg_colors = fg_colors
        self.bg_colors = bg_colors
        self.window_bg_color = window_bg_color 
        self.figure_indices = set(NUMBER_TEMPLATES.get(self.hidden_number, []))
        self.dots = [] 
        self.plate_width = width
        self.plate_height = height
        self.pre_calculate_dots() 
        
    def pre_calculate_dots(self):
        """Hitung dan simpan semua data dots HANYA SEKALI"""
        
        offset_x = (self.plate_width - (GRID_COLS * SLOT_SIZE)) // 2
        offset_y = (self.plate_height - (GRID_ROWS * SLOT_SIZE)) // 2
        
        # Pengaturan Radius untuk Kerapatan Tinggi
        LARGE_RADIUS_FG = SLOT_SIZE * 0.65 
        LARGE_RADIUS_BG = SLOT_SIZE * 0.60 
        
        JITTER_AMOUNT = SLOT_SIZE 

        for slot_idx in range(TOTAL_SLOTS):
            col = slot_idx % GRID_COLS
            row = slot_idx // GRID_COLS
            
            center_x = offset_x + col * SLOT_SIZE + SLOT_SIZE // 2
            center_y = offset_y + row * SLOT_SIZE + SLOT_SIZE // 2
            
            jitter_x = random.uniform(-JITTER_AMOUNT, JITTER_AMOUNT)
            jitter_y = random.uniform(-JITTER_AMOUNT, JITTER_AMOUNT)
            
            x = center_x + jitter_x
            y = center_y + jitter_y
            
            if slot_idx in self.figure_indices:
                color = random.choice(self.fg_colors)
                radius = random.uniform(LARGE_RADIUS_FG - 1.5, LARGE_RADIUS_FG + 0.5) 
            else:
                # Ganti random.choice(self.bg_colors) dengan darken_rgb dari window_bg_color
                # Atau tetap gunakan self.bg_colors tetapi pastikan itu lebih gelap
                # Saya akan tetap menggunakan self.bg_colors untuk variasi,
                # tapi pastikan definisi di COLOR_SCHEMES sudah lebih gelap.
                color = random.choice(self.bg_colors) 
                radius = random.uniform(LARGE_RADIUS_BG - 1.5, LARGE_RADIUS_BG + 0.5) 
            
            self.dots.append({'x': x, 'y': y, 'r': radius, 'color': color})

    def draw_dots(self, cairo_ctx, debug_mode=False):
        """Gambar dots menggunakan PyCairo dari data yang sudah disimpan"""
        
        for i, dot in enumerate(self.dots):
            is_figure = i in self.figure_indices
            
            if debug_mode:
                if is_figure:
                    cairo_ctx.set_source_rgb(0.0, 0.0, 0.0)
                else:
                    cairo_ctx.set_source_rgb(1.0, 1.0, 1.0)
            else:
                cairo_ctx.set_source_rgb(*dot['color'])
                
            cairo_ctx.arc(dot['x'], dot['y'], dot['r'], 0, 2 * math.pi)
            cairo_ctx.fill()

class ColorChallengeGame:
    """Main game class"""
    
    def __init__(self):
        pygame.init()
        self.screen = pygame.display.set_mode((SCREEN_WIDTH, SCREEN_HEIGHT))
        pygame.display.set_caption("The Color Challenge - Ishihara Test")
        self.clock = pygame.time.Clock()
        self.running = True
        
        self.font = pygame.font.Font(None, 36)
        self.small_font = pygame.font.Font(None, 24)
        self.large_font = pygame.font.Font(None, 72)
        
        self.current_plate = None
        self.user_input = ""
        self.feedback = ""
        self.total_score = 0
        self.attempts = 0
        self.correct_answers_in_level = 0
        self.current_level = 1 
        self.is_game_over = False
        self.debug_mode = False
        
        self.new_plate()
        
    def new_plate(self):
        if self.is_game_over:
            return

        scheme = COLOR_SCHEMES[self.current_level]
        fg = scheme['FG_COLORS']
        bg = scheme['BG_COLORS']
        window_bg = scheme['WINDOW_BG_COLOR'] 
        
        number_keys = list(NUMBER_TEMPLATES.keys())
        hidden_number = random.choice(number_keys)

        self.current_plate = IshiharaPlate(hidden_number, fg, bg, window_bg, SCREEN_WIDTH, SCREEN_HEIGHT - 100)
        
        self.user_input = ""
        self.feedback = ""
        
    def render_plate_to_pygame(self):
        current_window_bg = COLOR_SCHEMES[self.current_level]['WINDOW_BG_COLOR']
        
        cairo_surface = cairo.ImageSurface(cairo.FORMAT_ARGB32, SCREEN_WIDTH, SCREEN_HEIGHT - 100)
        cairo_ctx = cairo.Context(cairo_surface)
        
        # MENGISI CAIRO SURFACE DENGAN WARNA WINDOW BG LEVEL SAAT INI
        cairo_ctx.set_source_rgb(*current_window_bg) 
        cairo_ctx.paint()
        
        self.current_plate.draw_dots(cairo_ctx, self.debug_mode)
        
        buf = cairo_surface.get_data()
        pygame_surface = pygame.image.frombuffer(
            buf, 
            (SCREEN_WIDTH, SCREEN_HEIGHT - 100), 
            "BGRA"
        )
        
        return pygame_surface
    
    def draw_game_over_screen(self):
        self.screen.fill((20, 20, 20))
        
        title_surface = self.large_font.render("TES SELESAI", True, (255, 255, 255))
        self.screen.blit(title_surface, (SCREEN_WIDTH // 2 - title_surface.get_width() // 2, 100))
        
        score_surface = self.font.render(f"Skor Total Anda: {self.total_score} poin", True, (255, 255, 0))
        self.screen.blit(score_surface, (SCREEN_WIDTH // 2 - score_surface.get_width() // 2, 200))
        
        klasifikasi_text, klasifikasi_color = self.get_classification()
        
        result_title = self.font.render("Klasifikasi Hasil:", True, (255, 255, 255))
        self.screen.blit(result_title, (SCREEN_WIDTH // 2 - result_title.get_width() // 2, 300))
        
        result_surface = self.large_font.render(klasifikasi_text, True, klasifikasi_color)
        self.screen.blit(result_surface, (SCREEN_WIDTH // 2 - result_surface.get_width() // 2, 350))
        
        exit_surface = self.small_font.render("Tekan ESC untuk keluar", True, (150, 150, 150))
        self.screen.blit(exit_surface, (SCREEN_WIDTH // 2 - exit_surface.get_width() // 2, SCREEN_HEIGHT - 50))
        
    def get_classification(self):
        if self.total_score >= 35:
            return "Normal/Tidak Buta Warna", (0, 255, 0)
        elif self.total_score >= 20:
            return "Defisiensi Ringan", (255, 255, 0)
        else:
            return "Buta Warna Berat", (255, 0, 0)
            
    def draw_ui(self):
        input_area = pygame.Rect(0, SCREEN_HEIGHT - 100, SCREEN_WIDTH, 100)
        pygame.draw.rect(self.screen, (240, 240, 240), input_area)
        pygame.draw.rect(self.screen, (100, 100, 100), input_area, 2)
        
        instruction = self.small_font.render(f"Level {self.current_level}: Jawab {self.correct_answers_in_level}/3 Benar. Masukkan angka, tekan ENTER:", True, (50, 50, 50))
        self.screen.blit(instruction, (20, SCREEN_HEIGHT - 90))
        
        input_surface = self.font.render(self.user_input + "_", True, (0, 0, 0))
        self.screen.blit(input_surface, (20, SCREEN_HEIGHT - 60))
        
        if self.feedback:
            color = (0, 150, 0) if "Benar" in self.feedback else (200, 0, 0)
            feedback_surface = self.small_font.render(self.feedback, True, color)
            self.screen.blit(feedback_surface, (300, SCREEN_HEIGHT - 60))
        
        score_text = self.small_font.render(f"Skor Total: {self.total_score} | Percobaan: {self.attempts}", True, (50, 50, 50))
        self.screen.blit(score_text, (SCREEN_WIDTH - 250, SCREEN_HEIGHT - 90))

        debug_status = "DEBUG ON (D)" if self.debug_mode else "NORMAL (D)"
        debug_color = (200, 0, 0) if self.debug_mode else (0, 150, 0)
        debug_text = self.small_font.render(debug_status, True, debug_color)
        self.screen.blit(debug_text, (SCREEN_WIDTH - 250, SCREEN_HEIGHT - 30))
    
    def check_answer(self):
        self.attempts += 1
        current_weight = COLOR_SCHEMES[self.current_level]['SCORE_WEIGHT']
        
        if self.user_input == self.current_plate.hidden_number:
            self.total_score += current_weight
            self.correct_answers_in_level += 1
            self.feedback = f"Benar! ✓ (+{current_weight} poin)"
            
            if self.correct_answers_in_level >= 3:
                if self.current_level < MAX_LEVEL:
                    self.current_level += 1
                    self.correct_answers_in_level = 0
                    self.feedback += f" - NAIK KE LEVEL {self.current_level}!"
                elif self.current_level == MAX_LEVEL:
                    self.is_game_over = True
                    self.feedback = "BENAR! TES SELESAI!"
            
        else:
            self.total_score -= SCORE_PENALTY
            self.feedback = f"Salah! ✗ (-{SCORE_PENALTY} poin). Jawaban: {self.current_plate.hidden_number}"

        if not self.is_game_over:
            pygame.time.set_timer(pygame.USEREVENT, 2000)
    
    def handle_events(self):
        for event in pygame.event.get():
            if event.type == pygame.QUIT:
                self.running = False
            
            elif event.type == pygame.KEYDOWN:
                if event.key == pygame.K_d: 
                    self.debug_mode = not self.debug_mode
                    self.feedback = "DEBUG ON (H/P Jelas)" if self.debug_mode else "DEBUG OFF"
                
                if self.is_game_over and event.key == pygame.K_ESCAPE:
                    self.running = False

                if not self.is_game_over:
                    if event.key == pygame.K_RETURN and self.user_input:
                        self.check_answer()
                    
                    elif event.key == pygame.K_BACKSPACE:
                        self.user_input = self.user_input[:-1]
                    
                    elif event.unicode.isdigit() and len(self.user_input) < 2: 
                        self.user_input += event.unicode
            
            elif event.type == pygame.USEREVENT:
                pygame.time.set_timer(pygame.USEREVENT, 0)  
                if not self.is_game_over:
                    self.new_plate()
    
    def run(self):
        while self.running:
            self.handle_events()
            
            if self.is_game_over:
                self.draw_game_over_screen()
            else:
                current_window_bg = COLOR_SCHEMES[self.current_level]['WINDOW_BG_COLOR']
                
                # Konversi dari tuple RGB 0.0-1.0 ke tuple RGB 0-255 untuk Pygame
                bg_color_255 = (
                    int(current_window_bg[0] * 255),
                    int(current_window_bg[1] * 255),
                    int(current_window_bg[2] * 255)
                )
                
                # Mengisi seluruh layar Pygame dengan warna latar belakang level
                self.screen.fill(bg_color_255) 
                
                plate_surface = self.render_plate_to_pygame()
                
                self.screen.blit(plate_surface, (0, 0))
                self.draw_ui()
            
            pygame.display.flip()
            self.clock.tick(FPS)
        
        pygame.quit()
        sys.exit()

if __name__ == "__main__":
    game = ColorChallengeGame()
    game.run()