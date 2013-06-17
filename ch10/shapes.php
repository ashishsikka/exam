// circle
pdf_setcolor($p,"fill","rgb",0.8,0.5,0.8);
pdf_circle($p,400,600,75);
pdf_fill_stroke($p);

// funky arc
pdf_setcolor($p,"fill","rgb",0.8,0.5,0.5);
pdf_moveto($p,200,600);
pdf_arc($p,300,600,50,0,120);
pdf_closepath($p);
pdf_fill_stroke($p);

// dashed rectangle
pdf_setcolor($p,"stroke","rgb",0.3,0.8,0.3);
pdf_setdash($p,4,6);
pdf_rect($p,50,500,500,300);
pdf_stroke($p);
