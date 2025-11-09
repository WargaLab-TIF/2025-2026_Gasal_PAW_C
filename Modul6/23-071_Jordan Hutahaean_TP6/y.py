spbu = [0] * (9)

spbu[0] = 20
spbu[1] = 115
spbu[2] = 215
spbu[3] = 320
spbu[4] = 425
spbu[5] = 530
spbu[6] = 610
spbu[7] = 715
spbu[8] = 825
n = len(spbu)
tujuan = 870
kmperLiter = 8
kapasitas = 45
maksJarak = kapasitas * kmperLiter
minimalSisa = 8 * kmperLiter
posisi = 0
rute = ""
while posisi + maksJarak < tujuan - minimalSisa:
    spbuTerjauh = posisi
    for i in range(0, n - 1 + 1, 1):
        if spbu[i] > posisi and spbu[i] <= posisi + maksJarak:
            spbuTerjauh = spbu[i]
    if spbuTerjauh == posisi:
        print("Perjalanan tidak dapat dilanjutkan, tidak ada SPBU dalam jangkauan.")
    if spbuTerjauh + maksJarak >= tujuan - minimalSisa:
        pass
    rute = rute + str(spbuTerjauh) + ", "
    posisi = spbuTerjauh
print("Kendaraan harus mengisi bahan bakar di kilometer:")
print(rute)
